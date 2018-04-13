<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css"  href="css/alta.css">
<title> Registro de usuarios </title> 
</head>
<body>
<?php
//se inicia sesion para evitar infiltraciones
session_start();
if ($_SESSION['pag']<1){
	header("Location: inicio.php");
}
$_SESSION['pag']=0;
$_SESSION['alta']=1;
?>
<div class="header"> 
<h2>Registro de usuarios</h2>
<p>Completa el siguiente formulario con los datos solicitados: </p>
</div>
<form action="alta.php" method="post">
    <div>
	<label for="nombre">Nombre: </label>
	<input type="text" name="nombre" /><br><br>
    </div>
    <div>
	<label for="apaterno">Apellido Paterno: </label>
	<input type="text" name="apaterno" /><br><br>
    </div>
    <div>
	<label for="amaterno">Apellido Materno: </label>
	<input type="text" name="amaterno" /><br><br><br><br>
    </div>
    <p>Ingrese su nuevo usuario y contraseña: </p>
    <div>
	<label for="user_name">Usuario: </label>
	<input type="text" name="user_name" /><br><br>
    </div>
    <div>
	<label for="password">Contraseña: </label>
	<input type="password" name="password" /><br><br>
    </div>	
    <div>
	<input type="submit" value="Enviar" />
    </div>
<br><br>
<a href="creditos.php">CRÉDITOS DE REALIZACIÓN</a>
</form>
</body>
</html>
