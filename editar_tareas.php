<!-- Edición de tarea de la bd -->

<?php

	include('conexion.php');

	if(isset($_GET['id_tarea'])){
		$id_tarea = $_GET['id_tarea'];
		$consulta = "SELECT * FROM tareas WHERE id_tarea = $id_tarea";
		$resultado = mysqli_query($conexion, $consulta);

		if(mysqli_num_rows($resultado) == 1){
			$row = mysqli_fetch_array($resultado);
			$titulo = $row['titulo'];
			$descripcion = $row['descripcion'];

		}
	}

	if (isset($_POST['actualizar'])){
		$id_tarea = $_GET['id_tarea'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$consulta = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id_tarea = '$id_tarea'";

		mysqli_query($conexion, $consulta);

		$_SESSION['message'] = 'Tarea actualizada!';
		$_SESSION['message_type'] = 'info';

		header('Location: index.php');
	}
?>

<!-- Creación de nuevo formulario de edición de tarea ya existente -->

<?php include('includes/header.php'); ?>

	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<h3 class="text-center">Edición de Tarea</h3>
				<div class="card card-body">
					<form action="editar_tareas.php?id_tarea=<?php echo $_GET['id_tarea']; ?>" method="POST">
						<div class="form-group">
							<input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualizar título">
						</div>
						<div class="form-group">
							<textarea name="descripcion" rows="5" class="form-control" placeholder="Actualizar descripción"><?php echo $descripcion; ?></textarea>
						</div>
						<button class="btn btn-dark btn-block" name="actualizar">Actualizar
						</button>						
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>