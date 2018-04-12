<html>
<head>
<title>Alta Registro</title>
</head>
<body>
<?php

include 'conexion.php';
$conn = conectar();

//Se declara una variable para evitar errores en los formularios
$error = 0;
session_start();
if ($_SESSION['pag']==0){
	header("Location: inicio.php");
}

//SI es en alta usuarios
if ($_SESSION['alta']==1){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
	if ($_POST['password']){
		$password = md5($_POST['password']);	
	}
	else {
		$password = "";
		$error = 1;
	}
	if ($nombre) {
		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
			$error = 1;
		}
	} else{
		$error = 1;
	}
	if ($apaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$error = 1;
		}
	} else{
		$error = 1;
	}
	if ($amaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$error = 1;
		}
	}
	if (!$user_name) {
		$error = 1;
	}
	if (!$password) {
		$error = 1;
	}	
//Si no hay errores
if ($error == 0) {
$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,user_name,password) VALUES ('$nombre','$apaterno','$amaterno','$user_name','$password')");
$process = pg_query($conn, $query);

//La query se ejecuto?
if  (!$process) {
	$_SESSION['bd']=1;
}
else {
	$_SESSION['bd']=2;
}

} else{
	$_SESSION['bd']=1;
}

//Se cierra la conexion
pg_close($conn);

$_SESSION['pag']=1;
$_SESSION['alta']=0;
header("Location: menu.php");
}

//Si es en alta de autores
else if ($_SESSION['alta']==2){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);

	if ($nombre) {
		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
			$error = 1;
		}
	} else{
		$error = 1;
	}
	if ($apaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$error = 1;
		}
	} else{
		$error = 1;
	}
	if ($amaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$error = 1;
		}
	}
	if ($nacionalidad) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$error = 1;
		}
	} else{
		$error = 1;
	}

//Si no hay errores
	if ($error == 0) {
		$query = ("INSERT INTO autores (nombre,apaterno,amaterno,nacionalidad) VALUES ('$nombre','$apaterno','$amaterno','$nacionalidad')");
		$process = pg_query($conn, $query);

//La query se ejecuto?
		if  (!$process) {
			$_SESSION['bd']=1;
		}
		else {
			$_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;
	}

//Se cierra la conexion
	pg_close($conn);

	$_SESSION['pag']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");
} 

//Si es en alta de libros
else if ($_SESSION['alta']==3){
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$id_autor = $_POST['autor'];
	$anio_pub = $_POST['anio_pub'];

	if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$titulo)){
		echo "Error: Titulo invalido<br>";
		$error = 1;
	}

//SI no hay errores
	if ($error == 0) {
		$query = ("INSERT INTO libros (titulo,id_autor,anio_pub) VALUES ('$titulo','$id_autor','$anio_pub')");
		$process = pg_query($conn, $query);

//Se ejecuto la query?
		if  (!$process) {
			$_SESSION['bd']=1;
		}
		else {
			$_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;
	}

//Se cierra la conexion
	pg_close($conn);

	$_SESSION['pag']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");
}

//Si no es ninguno
else if ($_SESSION['alta']==0){
	$_SESSION['pag']=0;
	header("Location: login.php");
}

?>
</body>
</html>
