<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/inicio.css">
<title>Inicio de sesión</title>
</head>
<body>
<?php

session_start();
$_SESSION['pag']=0;

if ($_SESSION['error']==1){
	?><font color="yellow">Usuario y/o contraseña incorrectos</font><?php
	$_SESSION['error']=0;
}
else if ($_SESSION['error']==2){
	?><font color="yellow">Hubo un error al acceder a la base de datos</font><?php
}

?>
<form action="autenticar.php" method="post">
<div class="header">
<h2> Iniciar sesión </h2>
</div>
<p>Introduzca los siguientes datos para accesar: </p>
Usuario: <input type="text" name="user_name" autocomplete="off"><br><br>
Contraseña: <input type="password" name="password" autocomplete="off"><br><br>
<input type="submit" value="Ingresar">
</form>
</body>
</html>
