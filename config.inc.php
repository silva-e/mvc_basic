<?php 


define('BASE_URL','http://localhost:81/mvc/');

spl_autoload_register(function($myClass){


	if(file_exists('core/'.$myClass.'.php')){
		require('core/'.$myClass.'.php');
	}
	else if(file_exists('controlllers/'.$myClass.'.php')){
		require('controlllers/'.$myClass.'.php');
	}
	else if(file_exists('models/'.$myClass.'.php')){
		require('models/'.$myClass.'.php');
	}else{

		Core::loadView('v-error');
	}
});

 ?>