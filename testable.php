<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<!-- Bootstrap Datatables custom CSS -->
	<link href="assets/dist/css/datatables2.css" rel="stylesheet">
	<!-- Font Awesome Custom CSS -->
	<link href="assets/dist/css/FAIcons.css" rel="stylesheet">
	<!-- Font Awesome Script from icons -->
	<script src="https://kit.fontawesome.com/9b7d0e963c.js" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function() {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function() {
				if (this.checked) {
					checkbox.each(function() {
						this.checked = true;
					});
				} else {
					checkbox.each(function() {
						this.checked = false;
					});
				}
			});
			checkbox.click(function() {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-sm-4">
							<a href="#addEmployeeModal" class="btn btn-primary" data-toggle="modal"><i class="fa-solid fa-circle-plus"></i><span>Add New Employee</span></a>
							<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa-solid fa-circle-minus"></i><span>Delete</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Estatus</th>
							<th>Grado</th>
							<th>Institución</th>
							<th>Área de interés</th>
							<th>Mail</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<!-- Consulta de información de los miembros del grupo de investigación -->
					<?php
					include "conexion.php"; //Conexión a la base de datos
					$id_usuario = "2"; // Guardamos el id del usuario en sesión dentro de una variable
					$ret = mysqli_query($conexion, "select id_grupo from gruposinv where id_usuario = $id_usuario");
					while ($row = mysqli_fetch_array($ret)) // $row es un array con todos los campos existentes en la tabla
					{
						$id_grupo = "1"; //guardamos el id del gruopo en una variable
					}
					$sentencia = "SELECT * FROM miembroginv where id_grupo = $id_grupo"; //Realizamos el query a la base de datos
					// comienza un bucle que leerá todos los registros existentes
					$resultado = mysqli_query($conexion, $sentencia); // Ejecuta el Query
					while ($filas = mysqli_fetch_assoc($resultado)) { ?>
						<tbody>
							<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td>
									<?php echo $filas['nombre_int']; ?>
								</td>
								<td>
									<?php echo $filas['apellido_int']; ?>
								</td>
								<td>
									<?php echo $filas['estatus_int']; ?>
								</td>
								<td>
									<?php echo $filas['grado_int']; ?>
								</td>
								<td>
									<?php echo $filas['inst_int']; ?>
								</td>
								<td>
									<?php echo $filas['area_int']; ?>
								</td>
								<td>
									<?php echo $filas['mail_int']; ?>
								</td>
								<td>
									<div class="btn-group">
										<a href="modif_prod1.php?id_miembro=<?php echo $filas['id_miembro']; ?>" title="Editar">
											<span class="fa-solid  fa-pencil"></span>
										</a>
										<p>&nbsp;&nbsp;&nbsp;</p>
										<a href="eliminar_prod.php?id_miembro=<?php echo $filas['id_miembro']; ?>" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal" title="Eliminar">
											<span class="fa-solid fa-trash"></span>
										</a>
									</div>
								</td>
							<?php } ?>
							</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>