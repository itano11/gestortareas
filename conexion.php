<!-- Archivo conexión a la bd -->

<?php

	session_start();

	$conexion = mysqli_connect('localhost','root','','crudtareas');

/*	if(!isset($conexion)){
		echo "Error en la conexión a la base de datos!";
	}else{
		echo "Conectado a la base de datos!";
	}
*/
?>