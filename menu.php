<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Menu</title>
</head>
<body>
<div class="header">
<h2>Menu de altas</h2>
</div>
<div class="menu">
<?php
//se inicia la sesion para evitar infiltraciones
session_start();
if ($_SESSION['pag']==1) {
	if ($_SESSION['bd']==1){
		?><font color="yellow">Error en el registro. Intente de nuevo.<br><br></font><?php
		$_SESSION['bd']=0;
	}
	else if ($_SESSION['bd']==2){
		?><font color="blue">Registro exitoso<br><br></font><?php
		$_SESSION['bd']=0;
					}
}
?>
<a href="alta_usuario.php">Alta de usuarios</a><br><br>
<a href="alta_autor.php">Alta de autores</a><br><br>
<a href="alta_libro.php">Alta de libros</a><br><br>
<a href="creditos.php">CREDITOS DE REALIZACIÓN</a>
</div>
</body>
</html>
