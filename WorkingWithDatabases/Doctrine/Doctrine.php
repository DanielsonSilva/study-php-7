<html>
<head>
<meta charset="UTF-8">
<title>Doctrine Example</title>
</head>
<body>
<b>Doctrine Example</b><br>
<br>
Doctrine is a composer package to facilitate the connection between the PHP application and the database. It helps to create SQL statements with functions that are easy to read and maintain.<br> 
Since Doctrine\dbal extends PDO, every code that runs PDO, runs with Doctrine in DriveManager like:<br>
<b>$conn = \Doctrine\DBAL\DriveManager::getConnection(array("url"=>"mysql://root@localhost/test"));</b><br>
<br>
For this example, we are using the same table created in PDO class.<br>
In Doctrine DBAL, exists QueryBuilder to help create queries more readable and maintainable. To use, we can code:<br>
<xmp>require __DIR__ . '/vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
try {
	$connParameters = [
		"url" => "mysql:host=127.0.0.1;port=3307;dbname=test;username=root;"
	];
	$conn = DriverManager::getConnection($connParameters);
	$id = 1;
	$age = 30;
	$queryBuilder = $conn->createQueryBuilder();
	$queryBuilder->select('*')
		     ->from('client')
		     ->where('id_client = ?')
		     ->setParameter(0, $id);
	// If $age was sent via POST or GET and was an optional search parameter
	if (isset($age)) {
		$queryBuilder->andWhere('age = ?')
			     ->setParameter(1, $age);
	}
	$results = $queryBuilder->execute();
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
</xmp>
Results in:<br>
<br>
<?php 
require __DIR__ . '/vendor/autoload.php';
use Doctrine\DBAL\DriverManager;
try {
	$connParameters = [
			"url" => "mysql:host=127.0.0.1;port=3307;dbname=test;username=root;"
	];
	$conn = DriverManager::getConnection($connParameters);
	$id = 1;
	$age = 30;
	$queryBuilder = $conn->createQueryBuilder();
	$queryBuilder->select('*')
				 ->from('client')
				 ->where('id_client = ?')
				 ->setParameter(0, $id);
	// If $age was sent via POST or GET and was an optional search parameter
	if (isset($age)) {
		$queryBuilder->andWhere('age = ?')
					 ->setParameter(1, $age);
	}
	$results = $queryBuilder->execute();
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?><br>
<br>
Doctrine has another package called ORM to use tables as objects in PHP code. For this example we use the <b>client</b> table as an object. The class was designed in the file <i>Client.php</i> in this same folder and contains:<br>
<xmp>class Client {
	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id_client;
	
	/** @Column(type="string", length=45) */
	private $name;
	
	/** @Column(type="string", length=100) */
	private $address;
	
	/** @Column(type="integer") */
	private $age;
	
	/** @Column(type="integer") */
	private $gender;
	
	/** @Column(type="integer") */
	private $document_id;
	
	/** @Column(type="string", length=15) */
	private $telephone;
	
	/** @Column(type="string", length=15) */
	private $mobile_fone;
}</xmp>
And to use this class, we can do:<br>
<xmp>
require_once __DIR__ . "\Client.php";
use Doctrine\ORM\{Tools\Setup, EntityManager, Mapping\Driver\AnnotationDriver};
use Doctrine\Common\Annotations\{AnnotationReader, AnnotationRegistry};
try{
	$paths = array(__DIR__);
	$isDevMode = true;

	$config = Setup::createConfiguration($isDevMode);
	$driver = new AnnotationDriver(new AnnotationReader(), $paths);
	
	// registering noop annotation autoloader - allow all annotations by default
	AnnotationRegistry::registerLoader('class_exists');
	$config->setMetadataDriverImpl($driver);
	$entityManager = EntityManager::create($conn, $config);
	
	$clientRepo = $entityManager->getRepository("Client");
	$client1 = $clientRepo->find(1);
	var_dump($client1);
	echo "<br>";
	$client2 = $clientRepo->find(2);
	var_dump($client2);
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
</xmp>
Resulting in:<br>
<br>
<?php 
require_once __DIR__ . "\Client.php";
use Doctrine\ORM\{Tools\Setup, EntityManager, Mapping\Driver\AnnotationDriver};
use Doctrine\Common\Annotations\{AnnotationReader, AnnotationRegistry};

try{
	$paths = array(__DIR__);
	$isDevMode = true;

	$config = Setup::createConfiguration($isDevMode);
	$driver = new AnnotationDriver(new AnnotationReader(), $paths);
	
	// registering noop annotation autoloader - allow all annotations by default
	AnnotationRegistry::registerLoader('class_exists');
	$config->setMetadataDriverImpl($driver);
	$entityManager = EntityManager::create($conn, $config);
	
	$clientRepo = $entityManager->getRepository("Client");
	$client1 = $clientRepo->find(1);
	var_dump($client1);
	echo "<br>";
	$client2 = $clientRepo->find(2);
	var_dump($client2);
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?><br>
</body>
</html>