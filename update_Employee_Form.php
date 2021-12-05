<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
  <title>Modificación del empleado.</title>
</head>  
<body>
<div class="linkToIndex">
	<a class="links" href="http://localhost/Practice_Site/index.php">Regresar a Index</a>
</div>
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
if(isset($_POST['modificar1']))
{
	$consulta = "SELECT first_name,last_name,email,department FROM `employees` WHERE `id`=:id";
	$sql = $connect-> prepare($consulta);
	$sql -> bindParam(':id', $id, PDO::PARAM_INT);
	$id=trim($_POST['id']);
	$sql->execute();

	$results = $sql -> fetchAll(PDO::FETCH_OBJ); 
	if($sql -> rowCount() > 0)   { 
	foreach($results as $result) { 
		define('first_name',$result -> first_name);
		define('last_name',$result -> last_name);
		define('email',$result -> email);
		define('department',$result -> department);
	}

	}
}
?>
	<form name="formulario" method="post" action="update_Employee_DB.php">
		<div>
		<fieldset>
		<legend>Modificacion de un empleado</legend>

		<label >Nombre del empleado:</label>
		<input type="text" name="first_name" size="50" value="<?php echo $result -> first_name ?>">
		<br>
		
		<label >Apellidos del empleado:</label>
		<input type="text" name="last_name" size="50" value="<?php echo $result -> last_name ?>">
		<br>

		<label >Email del empleado:</label>
		<input type="text" name="email" size="50" value="<?php echo $result -> email ?>">
		<br>

		<label >Departamento del empleado:</label>
		<input type="text" name="department" size="50" value="<?php echo $result -> department ?>">
		<br>

		<input type="hidden" name="id" value="<?php echo $id ?>"> 

		<input type="submit" name="modificar2" value="confirmar">
		</fieldset>
		</div>
	</form>

</body>
</html>