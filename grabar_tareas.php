<!-- Creación de consulta e incorporación a la bd, una vez insertados los datos a la bd redirije al index.php  -->

<?php

	include('conexion.php');

	if(isset($_POST['grabarTarea'])){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		
		$consulta = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
		$resultado = mysqli_query($conexion, $consulta);

		if (!$resultado){
			die("No fue posible insertar nueva tarea");
		}
		
		$_SESSION['message'] = 'Tarea guardada!';
		$_SESSION['message_type'] = 'success';

		header("location: index.php");


	}else{
		echo "no existe recepción de datos";
	}
?>