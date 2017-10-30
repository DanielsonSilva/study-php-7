<?php 

class ClientRepository
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

	public function getAllClients(): array
	{
		$statement = $this->conn->prepare("SELECT * FROM client");
		$statement->execute();
		$arrClient = $statement->fetchAll();
		return $arrClient;
	}
}