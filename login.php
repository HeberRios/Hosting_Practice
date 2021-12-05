<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<title>Inicio de sesion</title>
</head>
<body>
<div class="linkToIndex">
	<a class="links" href="http://localhost/Practice_Site/index.php">Regresar a Index</a>
</div>
<?php
 include('config.php');
 session_start();
  
 if (isset($_POST['login'])) {
  
     $username = $_POST['username'];
     $password = $_POST['password'];
  
     $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
     $query->bindParam("username", $username, PDO::PARAM_STR);
     $query->execute();
  
     $result = $query->fetch(PDO::FETCH_ASSOC);
  
     if (!$result) {
	 echo '<p class="error">Username password combination is wrong!</p>';
     } else {
	 if (password_verify($password, $result['password'])) {
	     $_SESSION['user_id'] = $result['id'];
	     echo '<p class="success">Congratulations, you are logged in!</p>';
	     header('Location:index.php'); 
	 } else {
	     echo '<p class="error">Username password combination is wrong!</p>';
	 }
     }
 }
  
 ?>
 
<form method="post" action="" name="signin-form">
    <div>
        <fieldset>
            <legend>Inicio de sesion</legend>
            <label>Usuario</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />

            <label>Contraseña</label>
            <input type="password" name="password" required />
            <input type="submit" name="login" value="Iniciar sesion">
            
        </fieldset>
    </div>

</form>
</body>
</html>