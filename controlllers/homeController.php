<?php 

class homeController{

	public function index()
	{
		$db = Core::conn();
		$sql = 'SELECT * FROM config_app';
		$stm = $db->prepare($sql);
		$stm->execute();
		$stm =$stm->fetchAll(PDO::FETCH_OBJ);

		$data['dados'] = $stm;
		

		$data['title'] = 'TItulo da pagina principal';
		Core::loadView('default', $data);
	}


}

 ?>