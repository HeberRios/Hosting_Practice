<?php
try
{
// Ejecutamos las variables y aplicamos UTF8
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

if(isset($_POST['borrar'])){
	////////////// Actualizar la tabla /////////
	$consulta = "DELETE FROM `employees` WHERE `id`=:id";
	$sql = $connect-> prepare($consulta);
	$sql -> bindParam(':id', $id, PDO::PARAM_INT);
	$id=trim($_POST['id']);
	
	$sql->execute();
}
header('Location:index.php'); 
?>