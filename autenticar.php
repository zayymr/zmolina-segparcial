<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="css/menu.css">
<title>Autenticar</title>
</head>
<body>
<?php
//se inicia la sesion
session_start();
//archivo de conexion 
include 'conexion.php';
$conn = conectar();
if ($_SESSION['pag']==0){
	header("Location: inicio.php");
}


$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
$password = md5($_POST['password']);
echo "<h2>Datos</h2>Usuario: ".$user_name;
echo "<br>Contraseña: ".$password;

//hace la consulta correspondiente
$query = ("SELECT password FROM usuarios WHERE user_name = '$user_name'");
$process = pg_query($conn, $query);

//La query se ejecuto?
if  (!$process) {
	$_SESSION['error']=2;
	header ("Location: inicio.php");
	}
	else {
	//Si funciono la query comparar la contraseña
		$result = pg_fetch_result($process, 0, 0);
			if ($result == $password){
				session_start();
				$_SESSION['pag']=1;
				header("Location: menu.php");
			}else {
			session_start();
			$_SESSION['error']=1;
			header("Location: inicio.php");
				}
		}
pg_close($conn);
?>
</body>
</html>

