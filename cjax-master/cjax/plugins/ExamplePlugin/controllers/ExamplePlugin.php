<?php

/**
 * 
 * This class and the entire controllers directory in this plugin is not necessary for a plugin to fully operate.
 * But provides additonal  information and examples in case you do need to make requests in your plugin to the plugin itself.
 * 
 * @author cj
 *
 */
class controller_ExamplePlugin {
	
	
	function docs()
	{
		/**
		 * If you Return an array or an object then it will  be returned as json.
		 * 
		 */
		return array('test1'=>'test1','test2'=>'test2');
	}
	
}