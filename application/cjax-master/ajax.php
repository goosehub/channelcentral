<?php
//@app_header;

//if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
//    die('You are using PHP'.PHP_VERSION.'. Currently, Cjax uses PHP 5.2 OR PHP5.3 to operate.');
//}
		
if(!defined('AJAX_CD')) {
	//if you experience a file not found error, and  AJAX_CD hasn't been defined anywhere
	//enter a relateive path to the base directory where the controllers are.
	define('AJAX_CD', 'controllers');
}
	
/**
 * //@ajax_php;
 **/
class ajax  {
	
	function ajax($controller)
	{
		$ajax = ajax();
		
		$controller = $raw_class = preg_replace('/:.*/', '', $controller);
		$function = (isset($_REQUEST['function'])? $_REQUEST['function']: null);
		
		if($ajax->config->camelize) {
			$raw_class = $ajax->camelize($raw_class, $ajax->config->camelizeUcfirst);
		}
		$class_exists = false;
		$requestObject = null;
		$alt_controller = null;
		
		if(preg_match("/[^a-zA-Z0-9_]/", $controller)) {
			$this->abort("Invalid Controller: $controller");
		}
		if($function && preg_match("/[^a-zA-Z0-9_]/", $function)) {
			//if function is empty, it still passes.
			$this->abort("Invalid Function: $function");
		}

		if(file_exists($f = CJAX_HOME.'/'.'includes.php')) {
			if(!defined('AJAX_INCLUDES')) {
				$ajax->includes = true;
				include_once $f;
			}
		}	
		$args = $this->_params();
		
		if($controller=='_crossdomain') {
			return $this->_response(call_user_func_array(array($ajax, 'crossdomain'), $args));
		}
		
		if($plugin = $ajax->plugin($controller, true)) {
			if(method_exists($plugin, $function)) {
				return $this->_response(call_user_func_array(array($plugin, $function), $args));
			} else {
				$alt_controller = $plugin->controller_file;
				if(!file_exists($alt_controller)) {
					$this->abort("{$controller} Plugin: Controller File Not Found.");
				}
			}
		}
		
		$is_file = $this->_files($controller, $alt_controller);
		
		if($is_file) {
			$class_exists = $this->_class($controller);
			$requestObject = $this->_controller($class_exists, $controller, $function);
		}
		if(file_exists($f = CJAX_HOME.'/auth.php')) {
			require_once $f;
			if(class_exists('AjaxAuth')) {
				$auth = new AjaxAuth;
				if(!$auth->validate($controller, $function, $args, $requestObject)) {
					return $auth->authError();
				}
			} else {
				$this->abort("Class AjaxAuth was not found.");
			}
			if(method_exists($auth, 'intercept') && $_response = $auth->intercept($controller, $function , $args, $requestObject)) {
				if(is_array($_response) || is_object($_response)) {
					return $this->_response($_response);
				}
				return true;
			}
		}
		if(!$is_file) {
			header("Content-disposition:inline; filename='{$controller}.php'");
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 Not Found");
			$this->abort("Controller File: $controller.php not found");
		}
		if(!$class_exists) {
			$this->abort("Controller Class \"{$raw_class}\" could not be found.");
		}
		if(!$function) {
			$function = $raw_class;
		}
		if(!method_exists($requestObject,$function)) {
			$this->abort("Controller Method/Function: {$raw_class}::{$function}() was not found");
		}
		return $this->_response( call_user_func_array(array($requestObject, $function), $args) );
	}
	
	function abort($err)
	{
		ajax()->error($err);
		exit($err);
	}

	protected function _response($response)
	{
		if($response && (is_array($response) || is_object($response))) {
			header('Content-type: application/json; charset=utf-8');
			print CoreEvents::json_encode($response);
		}		
	}
	
	protected function _files($controller, $alt_controller = null)
	{
		$ajax = ajax();
		if($alt_controller) {
			$files[] = $alt_controller;
		}
		if(defined('AJAX_CD')) {
			$ajax_cd = AJAX_CD;
		} else if(isset($_COOKIE['AJAX_CD']) && $_COOKIE['AJAX_CD']) {
			$ajax_cd = $_COOKIE['AJAX_CD'];
		}
		
		$files[] = "{$ajax_cd}/{$controller}.php";
		$files[] = "{$ajax->controller_dir}/{$ajax_cd}/{$controller}.php";
		$files[] = dirname(__file__)."/{$ajax_cd}/{$controller}.php";
		
		do {
			if(file_exists($f = $files[key($files)])) {
				require_once $f;
				return $f;
			}
		} while( next($files) );
	}
	
	protected function _params()
	{
		$args = array();
		$arg_count = count(array_keys($_REQUEST)) - 3;
		foreach(range('a','z') as $k => $v) {
			if(isset($_REQUEST[$v])) {
				if(is_array($_REQUEST[$v])) {
					foreach($_REQUEST[$v] as $k2 => $v2) {
						if(is_array($_REQUEST[$v][$k2])) {
							$args[$v][$k2] = array_map('urldecode', $_REQUEST[$v][$k2]);
						} else {
							$args[$v][$k2] = urldecode($_REQUEST[$v][$k2]);
						}
					}
				} else {
					$args[$v] = urldecode($_REQUEST[$v]);
				}
			} else {
				$args[$v] = null;
			}
			if($k >= $arg_count) {
				break;
			}
		}
		if(function_exists('cleanInput')) {
			$args = cleanInput($args);
			$_REQUEST = cleanInput($_REQUEST,'_REQUEST');
			$_POST = cleanInput($_POST,'_POST');
			$_GET = cleanInput($_GET,'_GET');
		}
		
		$ajax = ajax();
		foreach($args as $k => $v) {
			if(is_array($v)) {
				$ajax->{$k} = new ext($v);
			} else {
				$ajax->{$k} = $v;
			}
		}
		return $args;
	}
	
	
	protected function _controller($class, $raw_controller, $function)
	{
		if(!$class) {
			return false;
		}
		$ajax = ajax();
		if(method_exists($class, $raw_controller)) {
			$parent = get_parent_class($class);
			//prevent constructor
			$_class = 'empty_'.$class;
			eval('class ' . $_class . ' extends '. $class .'{}');
			if(!$function) {
				if(method_exists($class, $class)) {
					$obj = new $_class;
					$function = $class;
				} else {
					return new $class;
				}
			} else {
				$obj = new $_class();
			}
		} else {
			$obj = new $class;
		}
		return $obj;
	}

	protected function _class($controller)
	{
		$raw_controller = $controller;
		$ajax = ajax();
		if($ajax->config->camelize) {
			$controller = $ajax->camelize($controller, $ajax->config->camelizeUcfirst);
		}
		$_classes = array();
		$_classes[] = 'controller_'.$controller;
		$_classes[] = '_'.$controller;
		$_classes[] = $controller;
		
		//backward compatiblity with > 5.0-RC2
		$_classes[] = 'controller_'.$raw_controller;
		$_classes[] = '_'.$raw_controller;
		$_classes[] = $raw_controller;
		
		do {
			$c = $_classes[key($_classes)];
			
			if(class_exists($c)) {
				return $c;
			}
		} while(next($_classes));
		
		
		return $c;
	}
}
define('AJAX_CONTROLLER',1);
require_once (dirname(__file__)).'/cjax/cjax.php';
$ajax = CJAX::getInstance();
$controller = $ajax->input('controller');
if($controller) {
	new ajax($controller);
}