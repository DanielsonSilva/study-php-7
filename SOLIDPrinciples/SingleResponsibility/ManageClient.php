<?php 
require_once("ClientRepository.php");

class ManageClient
{
	public function __construct()
	{
		echo "Client manager created!<br>";
	}

	public function showAll(): string
	{
		$repo = new ClientRepository();
		$clients = $repo->getAllClients();
		$resultShow = "";
		foreach ($clients as $key => $value) {
			$resultShow .= $value['id_client'] . " - " . $value['name'];
			$resultShow .= " lives in " . $value['address'] . " and has " . $value['age'] . " years old.<br>";
		}
		return $resultShow;
	}
}