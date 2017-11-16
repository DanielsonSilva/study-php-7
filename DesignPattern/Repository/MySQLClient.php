<?php

require_once("ClientRepository.php");
require_once("Client.php");

class MySQLClient implements ClientRepository
{
    private $connection;

    public function __construct(PDO $con)
    {
        $this->connection = $con;
    }

    public function getClientFields($id): Client
    {
        $statement = $this->connection->prepare("SELECT * FROM client WHERE id_client = :id");
    	$statement->bindParam(":id", $id);
    	$statement->execute();
    	$results = $statement->fetchAll();
        $client = new Client();
    	foreach ($results as $row) {
    		$client->id_client = $row['id_client'];
            $client->name = $row['name'];
            $client->gender = $row['gender'];
            $client->age = $row['age'];
            $client->document_id = $row['document_id'];
            $client->telephone = $row['telephone'];
            $client->mobile_fone = $row['mobile_fone'];
    	}
        return $client;
    }
}
