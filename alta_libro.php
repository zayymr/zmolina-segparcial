<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css"  href="css/alta.css">
<title> Registro de usuarios </title> 
</head>
<body>
<?php
session_start();
$_SESSION['alta']=3;
if ($_SESSION['pag']==0){
	header("Location: inicio.php");
}
$_SESSION['pag']=0;
include 'conexion.php';
$conn = conectar();
$query = ("SELECT id_autor,nombre,apaterno FROM autores");
$process = pg_query($conn, $query);
?>
<div class="header"> 
<h2>Registro de libros</h2>
<p>Completa el siguiente formulario con los datos solicitados: </p>
</div>
<form action="alta.php" method="post">
    <div>
	<label for="titulo">Título: </label>
	<input type="text" name="titulo" /><br><br>
    </div>
    <div>
	<label  for="autor">Autor: </label>
	<select name="autor"> 
<?php
	while ($row = pg_fetch_row($process)) {
			  echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
			  	}
?>
	</select><br><br>
    </div>
    <div>
	<label for="anio_pub">Año de publicación: </label>
	<input type="text" name="anio_pub" /><br><br>
    </div>
    <div>
	<input type="submit" value="Enviar" />
    </div>
<a href="creditos.php">CREDITOS DE REALIZACIÓN</a>
</form>
</body>
</html>
