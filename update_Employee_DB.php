<?php
try
{
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','empresa');

$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
} 

if(isset($_POST['modificar2']))
{
	$id=trim($_POST['id']);
	$first_name=trim ($_POST['first_name']);
	$last_name=trim ($_POST['last_name']);
	$email=trim ($_POST['email']);
	$department=trim ($_POST['department']);

$consulta = "UPDATE employees
SET `first_name`= :first_name, `last_name` = :last_name, `email` = :email, `department` = :department
WHERE `id` = :id";

$sql = $connect->prepare($consulta);
$sql->bindParam(':first_name',$first_name,PDO::PARAM_STR, 64);
$sql->bindParam(':last_name',$last_name,PDO::PARAM_STR, 64);
$sql->bindParam(':email',$email,PDO::PARAM_STR,64);
$sql->bindParam(':department',$department,PDO::PARAM_STR, 64);
$sql->bindParam(':id',$id,PDO::PARAM_INT);

$sql->execute();
}
header('Location:index.php'); 
?>