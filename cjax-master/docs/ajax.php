<?php

if(!file_exists($f = '../ajaxfw.php') && !file_exists($f = '../ajax.php')) {
	die("Ajax File was not found.");
}
require_once $f;
$ajax  = ajax();
if(!$ajax->isAjaxRequest()) {
	
	$ajax->document('body.innerHTML', array('prepend'=>"
	<div>
	<a href='http://cjax.sourceforge.net'>
	<img src='http://cjax.sourceforge.net/media/logo.png' border=0/>
	</a>
	</div>"));
	
	$ajax->import('resources/css/table.css');

}