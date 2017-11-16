<?php

class BadClientController
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=127.0.0.1;port=3307;dbname=test";
        $username = "root";
        $password = "";

        try {
        	$this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
        	echo "Connection failed: " . $e->getMessage();
        }
    }

    public function show($id_client)
    {
        $statement = $this->connection->prepare("SELECT * FROM client WHERE id_client = :id");
    	$statement->bindParam(":id", $id_client);
    	$statement->execute();
    	$results = $statement->fetchAll();
    	foreach ($results as $row) {
    		echo json_encode($row, JSON_PRETTY_PRINT) . PHP_EOL;
    	}
    }
}
