<?php
function conectar(){
	$conn = pg_connect("host=127.0.0.1 port=5432 dbname=segundoexamenbd user=alta_user password=holamundo123");
	return $conn;
	}
?>
