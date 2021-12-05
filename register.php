<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<title>Registro</title>
</head>
<body>
<div class="linkToIndex">
	<a class="links" href="http://localhost/Practice_Site/index.php">Regresar a Index</a>
</div>
<?php
 
 include('config.php');
 session_start();
  
 if (isset($_POST['register'])) {
  
     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $password_hash = password_hash($password, PASSWORD_BCRYPT);
  
     $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
     $query->bindParam("email", $email, PDO::PARAM_STR);
     $query->execute();
  
     if ($query->rowCount() > 0) {
	 echo '<p class="error">The email address is already registered!</p>';
     }
  
     if ($query->rowCount() == 0) {
	 $query = $connection->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
	 $query->bindParam("username", $username, PDO::PARAM_STR);
	 $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
	 $query->bindParam("email", $email, PDO::PARAM_STR);
	 $result = $query->execute();
  
	 if ($result) {
	     echo '<p class="success">Your registration was successful!</p>';
	     header('Location:login.php');
	 } else {
	     echo '<p class="error">Something went wrong!</p>';
	 }
     }
 }
  
 ?>
<form method="post" action="" name="signup-form">
	<div>
	<fieldset>
	<legend>Registro</legend>
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        <label>Correo electronico</label>
        <input type="email" name="email" required />
        <label>Contraseña</label>
        <input type="password" name="password" required />
	<input type="submit" name="register" value="Registrar">
	</fieldset>
	</div>
</form>
</body>
</html>