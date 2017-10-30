<html>
<head>
<meta charset="UTF-8">
<title>SOLID Principles - Single Responsibility Example</title>
</head>
<body>
<b>Single Responsibility Principle</b><br>
<br>
This principle states that certain class has to have only one reason to change. If a class can have two or more reasons to change, 
this class do not attend the Single Responsibility Principle.<br>
For example let us analyze this class that use the database table created in <i>Working With Databases</i> section:<br>
<xmp>
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
}</xmp>
Executing the commands right below, we have:
<xmp>require_once("ClientInformation.php");
$test = new ClientInformation();
echo $test->getAllClients();
</xmp>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br><br>
<?php 
require_once("ClientInformation.php");
$test = new ClientInformation();
echo $test->getAllClients();
?><br>
So, the function <b>getAllClients</b> gets the data <b>AND</b> return the display of the data. If the table structure changes 
or the display of the data changes, the same function has to change. This class has two reasons to change, so do not attend 
the Single Responsibility Principle.<br>
To change to attend this principle, we must divide this big class in two minor classes: <b>ClientRespository</b> and <b>ManageClient</b>. 
The definition of these two classes is below:<br>
<b>ClientRepository.php</b>
<xmp>
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
</xmp>
<b>ManageClient.php</b>
<xmp>
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
</xmp>
So, executing the commands below we have:
<xmp>require_once("ManageClient.php");
$manager = new ManageClient();
echo $manager->showAll();
</xmp>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br><br>
<?php 
require_once("ManageClient.php");
$manager = new ManageClient();
echo $manager->showAll();
?><br>
With this design, <b>ManageClient</b> only concerns about the presentation of the data and <b>ClientRepository</b> with the table structure. Finally attending the Single Responsibility Principle.
</body>
</html>