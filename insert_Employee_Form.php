<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
  <title>Alta de empleados</title>
</head>  
<body>
<div class="linkToIndex">
	<a class="links" href="http://localhost/Practice_Site/index.php">Regresar a Index</a>
</div>
<form name="formulario" method="post" action="insert_Employee_DB.php">
	<div>
	<fieldset>
	<legend>Alta de un nuevo empleado</legend>
	
	<label >Ingrese el nombre del empleado:</label>
        <input type="text" name="first_name" required>
        <br>

        <label >Ingrese el o los apellidos del empleado:</label>
        <input type="text" name="last_name" required>
        <br>

        <label >Ingrese el email del empleado:</label>
        <input type="text" name="email" required>
        <br>

        <label >Ingrese el departamento del empleado:</label>
        <input type="text" name="department" required>
        <br>

        <input type="submit" name="insert" value="confirmar">
	</fieldset>
	</div>
</form>
</body>
</html>