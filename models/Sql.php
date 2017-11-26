<?php 

class Sql{

	public function insertSql($tabela, $campos= array(), $valores = array())
	{
		$campos = implode(',',$campos);
		$valores = implode(',', $valores);

		$sql = "INSERT INTO {$tabela} ({$campos}) VALUES({$valores})";
		
	}
}

 ?>