<?php

require_once("ClientRepository.php");
require_once("MySQLClient.php");
require_once("Client.php");

class ClientController
{
    private $connection;
    private $repository;

    public function __construct(ClientRepository $rep)
    {
        $dsn = "mysql:host=127.0.0.1;port=3307;dbname=test";
        $username = "root";
        $password = "";
        $this->repository = $rep;

        try {
        	$this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
        	echo "Connection failed: " . $e->getMessage();
        }
    }

    public function show($id_client): void
    {
        $foundClient = $this->repository->getClientFields($id_client);
        echo "The client found was:" . PHP_EOL;
        echo "$foundClient->name - Age: $foundClient->age - Gender: $foundClient->gender - Identification: ";
        echo "$foundClient->document_id - Telephone: $foundClient->telephone - Mobile Fone: $foundClient->mobile_fone";
    }
}
