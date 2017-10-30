<?php 

class ClientInformation
{
	private const DSN = "mysql:host=127.0.0.1;port=3307;dbname=test";
	private const USERNAME = "root";
	private const PASSWORD = "";
	private $conn;
	
	public function __construct()
	{
		try {
			$this->conn = new PDO(self::DSN, self::USERNAME, self::PASSWORD);
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	public function getAllClients(): string
	{
		// Getting the data
		$statement = $this->conn->prepare("SELECT * FROM client");
		$statement->execute();
		$arrClient = $statement->fetchAll();
		
		// Return the client information in string
		$resultShow = "";
		foreach ($arrClient as $key => $value) {
			$resultShow .= $value['id_client'] . " - " . $value['name'];
			$resultShow .= " lives in " . $value['address'] . " and has " . $value['age'] . " years old.<br>";
		}
		return $resultShow;			
	}
}
