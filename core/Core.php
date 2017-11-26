<?php 

class Core {

	public function run()
	{ 
		// $url = null;

		
		if(empty($_GET['url'])){
				$url = BASE_URL;

				$currentController = 'homeController';
				$currentAction = 'index';

		}else{
			$url = $_GET['url'];
			$url = explode('/', $url);

			if(count($url) == 1|| count($url) == 2 && empty($url[1])){
	
			$currentController = $url[0].'Controller';
			$currentAction = 'index'; 
		}

			if(count($url) == 2 || count($url) == 3 && empty($url[3])){

				$currentController = $url[0].'Controller';
				array_shift($url);
				$currentAction = $url[0];
				array_shift($url);
			}

		}

		// if(count($url) == 3){
		// 	$currentController = $url[0];
		// 	array_shift($url);
		// 	$currentAction = $url[0];
		// 	array_shift($url);
		// 	 echo $param1 = $url[0];


			
		// }

		// if(count($url) == 4){
		// 	$currentController = $url[0];
		// 	array_shift($url);
		// 	$currentAction = $url[0];
		// 	array_shift($url);
		// 	$param1 = $url[0];
		// 	array_shift($url);
		// 	$param2 = $url[0];
		// }

		// $currentController = str_replace('/', '', $currentController);

	
			// var_dump($url);
		// exit;

		try {
			$core = new $currentController; 
			$core->$currentAction();
		} catch (Exception $e) {
			echo 'houve erro';
		}
		
	}

	public static function loadView($caminho, $dados= array())
	{
		if(count($dados) == 0){
		
			require('views/'.$caminho.'.php');
			return;

		}

		extract($dados);
		require('views/'.$caminho.'.php');
	}

	public static function conn()
	{
		if(empty($db)){
			try {
				return $db = new PDO('mysql:host=localhost;dbname=mvc_project;','root', '');	
			} catch (Exception $e) {
				print('Houve um erro com o banco de dados, verifique: '.$e->getMessage());
			}
		}
		
	}
}

 ?>