<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','empresa');
try
{
	$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
	exit("Error: " . $e->getMessage());
}

if(isset($_POST['insert']))
{
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$department=$_POST['department'];

	$sql="insert into employees(first_name,last_name,email,department) values(:first_name,:last_name,:email,:department)";

	$sql = $connect->prepare($sql);

	$sql->bindParam(':first_name',$first_name,PDO::PARAM_STR, 25);
	$sql->bindParam(':last_name',$last_name,PDO::PARAM_STR, 25);
	$sql->bindParam(':email',$email,PDO::PARAM_STR,25);
	$sql->bindParam(':department',$department,PDO::PARAM_STR,25);

	$sql->execute();
}
header('Location:index.php'); 
?>