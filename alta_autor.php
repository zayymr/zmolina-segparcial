<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css"  href="css/alta.css">
<title> Registro de usuarios </title> 
</head>
<body>
<?php
session_start();
if ($_SESSION['pag']==0){
	header("Location: inicio.php");
}
$_SESSION['pag']=0;
$_SESSION['alta']=2;
?>
<div class="header"> 
<h2>Registro de autores</h2>
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
	<input type="text" name="amaterno" /><br><br>
    </div>
    <div>
	<label for="nacionalidad">Nacionalidad: </label>
	<input type="text" name="nacionalidad" /><br><br>
    </div>	
    <div>
	<input type="submit" value="Enviar" />
    </div>
<a href="creditos.php">CREDITOS DE REALIZACIÓN</a>
</form>
</body>
</html>
