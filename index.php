<?php include('conexion.php'); ?>

<?php include('includes/header.php'); ?>

<!-- Script confirmación de eliminación de tarea --> 
<script type="text/javascript">
	function ConfirmarBorrar(){
		var respuesta = confirm("Seguro que deseas eliminar la tarea?");

		if (respuesta == true){
			return true;
		}else{
			return false;
		}
	}
</script>

<!-- Tarjeta contiene formulario ingreso de tarea -->
<div class="container p-4">
	<div class="row">
		<div class="col-md-3">
			<h4 class="text-center">Crear Nueva Tarea</h4>
			<div class="card card-body">
				<form action="grabar_tareas.php" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" class="form-control" placeholder="Título tarea" autofocus>
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="5" class="form-control" placeholder="Descripción tarea"></textarea>
					</div>
					<input type="submit" name="grabarTarea" class="btn btn-dark btn-block" value="Guardar Nueva Tarea">
				</form>
			</div>

<!-- Mensaje de acción emergente luego de crear, editar o borrar tarea -->
			<?php if(isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
  					<?= $_SESSION['message'] ?>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
				</div>
			<?php session_unset(); } ?>

		</div>

<!-- Tabla que muestra las atreas actuaes -->
		<div class="col-md-9">
			<h4 class="text-center">Listado de Tareas</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Título</th>
						<th>Descripción</th>
						<th>Fecha Creación</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

<!-- Captura desde la bd de las tareas actuales -->
					<?php
						$consulta = "SELECT * FROM tareas";
						$resultados_tareas = mysqli_query($conexion, $consulta);
						while($row = mysqli_fetch_array($resultados_tareas)){ ?>
							<tr>
								<td><?php echo $row['titulo'] ?></td>
								<td><?php echo $row['descripcion'] ?></td>
								<td><?php echo $row['fechaCreacion'] ?></td>
								<td>

<!-- Botón editar tarea -->
									<a href="editar_tareas.php?id_tarea=<?php echo $row['id_tarea']?>" class="btn btn-secondary btn-sm">
										<i class="fas fa-edit"></i>
									</a>

<!-- Botón eliminar tarea que incluye confirmación vía javascript de eliminación de tarea -->
									<a href="eliminar_tareas.php?id_tarea=<?php echo $row['id_tarea']?>" class="btn btn-danger btn-sm" onClick="return ConfirmarBorrar()"
										>
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
							</tr>
							
					<?php } ?>

				</tbody>
			</table>
		</div>	
	</div>
</div>

<?php include ('includes/footer.php'); ?>