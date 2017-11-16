<html>
<head>
<meta charset="UTF-8">
<title>Design Patterns - Repository Example</title>
</head>
<body>
<b>Repository Design Pattern</b><br>
<br>
The repository design pattern serves to separate the business logic from the specifications of database access.
The business logic don't need to know if the data to be shown should be query with MySQL, NoSql or other kind of database.
Let's see an example using the table created in PDO class (WorkingWithDatabases folder):<br>
<xmp>BadClientController.php
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

Test:
require_once("BadClientController.php");
$clientCon = new BadClientController();
$clientCon->show(1);

Result:
<?php
require_once("BadClientController.php");
$clientCon = new BadClientController();
$clientCon->show(1);
?></xmp>
It can be observed in the <b>BadClientController</b> class that the <i>show</i> method prepares the query using the
structure of the <i>client</i> table and execute it to show the results. But if the <i>client</i> table changed, the
developer had to search in the entire project for <i>client</i> usage.<br>
To solve this, we can create an interface between the <b>BadClientController</b> to turn it to just
<b>ClientController</b>. This interface will be between the <b>BadClientController</b> and the specifications in the
database class. Let's see how it is done:<br>
<xmp>ClientController.php
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

ClientRepository.php
interface ClientRepository
{
    public function getClientFields($id);
}

MySQLClient.php
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

Client.php
class Client
{
    private $id_client;
    private $name;
    private $age;
    private $gender;
    private $document_id;
    private $telephone;
    private $mobile_fone;

    public function __get($property)
	{
		if (property_exists($this, $property)) {
            if ($property === "gender") {
                if ($this->$property === 0) {
                    return "Female";
                } else {
                    return "Male";
                }
            }
            return $this->$property;
		} else {
			echo "Property ($property) not found. Try again!" . PHP_EOL;
		}
	}

    public function __set($property, $value)
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		} else {
			echo "Set this property ($property) not found. Try again!" . PHP_EOL;
		}
	}
}

Test:
require_once("ClientController.php");
try {
	$con = new PDO("mysql:host=127.0.0.1;port=3307;dbname=test", "root", "");
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$clientController = new ClientController(new MySQLClient($con));
$clientController->show(1);

Result:
<?php
require_once("ClientController.php");
try {
	$con = new PDO("mysql:host=127.0.0.1;port=3307;dbname=test", "root", "");
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$clientController = new ClientController(new MySQLClient($con));
$clientController->show(1);
?></xmp>
</body>
</html>
