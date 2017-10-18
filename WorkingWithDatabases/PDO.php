<html>
<head>
<meta charset="UTF-8">
<title>PDO - PHP Data Object Example</title>
</head>
<body>
<b>PDO - PHP Data Object</b><br>
<br>
When working with PHP and databases, the PHP provides several functions within the <i>mysqli</i> class for MySQL Database and <i>pg_*</i> function for PostgreSQL Databases. The functions aren't interchangeable. So, if there is a need to change the database, we have to change every function in all the code. To prevent that and get ourself a cleaner, correct and safety code, we have to use the <i>PDO</i> class.<br>
To connect to a database, we have to define which DBMS to use, port, username, password and name of the database. Which leads us to:<br>
<br>
$dsn = "mysql:host=127.0.0.1;port=3307;dbname=test";<br>
$username = "root";<br>
$password = "";<br>
try {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$conn = new PDO($dsn, $username, $password);<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Connected!";<br>
} catch (PDOException $e) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Connection failed: " . $e->getMessage();<br>
}<br>
<br>
Gives the following result:<br>
<?php
$dsn = "mysql:host=127.0.0.1;port=3307;dbname=test";
$username = "root";
$password = "";

try {
	$conn = new PDO($dsn, $username, $password);
	echo "Connected!";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?><br>
<br>
The table to use as example in MySQL DBMS is:<br>
CREATE TABLE `test`.`client` (<br>
&nbsp;&nbsp;`id_client` INT NOT NULL AUTO_INCREMENT,<br>
&nbsp;&nbsp;`name` VARCHAR(45) NOT NULL,<br>
&nbsp;&nbsp;`address` VARCHAR(100) NOT NULL,<br>
&nbsp;&nbsp;`age` INT NOT NULL,<br>
&nbsp;&nbsp;`gender` INT NOT NULL COMMENT '(0 - Male, 1 - Female)',<br>
&nbsp;&nbsp;`document_id` INT NOT NULL,<br>
&nbsp;&nbsp;`telephone` VARCHAR(15) NOT NULL,<br>
&nbsp;&nbsp;`mobile_fone` VARCHAR(15) NOT NULL,<br>
&nbsp;&nbsp;PRIMARY KEY (`id_client`));<br>
<br>
And add values to the table as:<br>
INSERT INTO client (name, address, age, gender, document_id, telephone, mobile_fone) VALUES ("&lt;name&gt;", "&lt;address&gt;", &lt;age&gt;, &lt;0 or 1 for gender&gt;, "&lt;document identificator&gt;", "&lt;telephone number&gt;", "&lt;mobile number&gt;");<br>
<br>
To print all the data in this table, we can use PDO as following:<br>
<br>
try {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$results = $conn->query("SELECT * FROM client");<br>
&nbsp;&nbsp;&nbsp;&nbsp;foreach ($results as $row) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r($row);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r("&lt;br&gt;");<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
} catch (PDOException $e) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Something gone wrong: " . $e->getMessage();<br>
}<br>
<br>
Gives the result below:<br>
<br>
<?php 
try {
	$results = $conn->query("SELECT * FROM client");
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}	
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?>
<br>
To use dynamic values into a query, the correct way to do it is using statements. We can use statements in three different ways.<br>
<b>(1)</b> - Ways using an array of parameters:<br>
<br>
try {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$id = 1;<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement = $conn->prepare("SELECT * FROM client WHERE id_client = ? AND age = ?");<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement->execute(array($id, 30));<br>
&nbsp;&nbsp;&nbsp;&nbsp;$results = $statement->fetchAll();<br>
&nbsp;&nbsp;&nbsp;&nbsp;foreach ($results as $row) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r($row);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r("&lt;br&gt;");<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
} catch (PDOException $e) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Something gone wrong: " . $e->getMessage();<br>
}<br>
<br>
Results:<br>
<?php 
try {
	$id = 1;
	$statement = $conn->prepare("SELECT * FROM client WHERE id_client = ? AND age = ?");
	$statement->execute(array($id, 30));
	$results = $statement->fetchAll();
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?><br>
<br>
<b>(2)</b> - Ways using an array of named parameters:<br>
<br>
try {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$id = 1;<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement = $conn->prepare("SELECT * FROM client WHERE id_client = :id AND age = :age");<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement->execute(array(<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;":id" => $id,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;":age" => 30<br>
&nbsp;&nbsp;&nbsp;&nbsp;));<br>
&nbsp;&nbsp;&nbsp;&nbsp;$results = $statement->fetchAll();<br>
&nbsp;&nbsp;&nbsp;&nbsp;foreach ($results as $row) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r($row);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r("&lt;br&gt;");<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
} catch (PDOException $e) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Something gone wrong: " . $e->getMessage();<br>
}<br>
<br>
Results:<br>
<?php 
try {
	$id = 1;
	$statement = $conn->prepare("SELECT * FROM client WHERE id_client = :id AND age = :age");
	$statement->execute(array(
			":id" => $id,
			":age" => 30
	));
	$results = $statement->fetchAll();
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?><br>
<br>
<b>(3)</b> - Ways using <b>bind</b> methods:<br>
<br>
try {<br>
&nbsp;&nbsp;&nbsp;&nbsp;$id = 1;<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement = $conn->prepare("SELECT * FROM client WHERE id_client = :id AND age = :age");<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement->bindParam(":id", $id);<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement->bindValue(":age", 30);<br>
&nbsp;&nbsp;&nbsp;&nbsp;$statement->execute();<br>
&nbsp;&nbsp;&nbsp;&nbsp;$results = $statement->fetchAll();<br>
&nbsp;&nbsp;&nbsp;&nbsp;foreach ($results as $row) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r($row);<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print_r("&lt;br&gt;");<br>
&nbsp;&nbsp;&nbsp;&nbsp;}<br>
} catch (PDOException $e) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "Something gone wrong: " . $e->getMessage();<br>
}<br>
<br>
Results:<br>
<?php 
try {
	$id = 1;
	$statement = $conn->prepare("SELECT * FROM client WHERE id_client = :id AND age = :age");
	$statement->bindParam(":id", $id);
	$statement->bindValue(":age", 30);
	$statement->execute();
	$results = $statement->fetchAll();
	foreach ($results as $row) {
		print_r($row);
		print_r("<br>");
	}
} catch (PDOException $e) {
	echo "Something gone wrong: " . $e->getMessage();
}
?>
</body>
</html>
















