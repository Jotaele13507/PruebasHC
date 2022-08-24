<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Datatables custom CSS -->
    <link href="assets/dist/css/datatables2.css" rel="stylesheet">
    <!-- Buttoms custom CSS -->
    <link href="assets/dist/css/botones.css" rel="stylesheet">
    <!-- Bootstrap IconCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Font Awesome Custom CSS -->
    <link href="assets/dist/css/FAIcons.css" rel="stylesheet">
    <!-- Font Awesome Script from icons -->
    <script src="https://kit.fontawesome.com/9b7d0e963c.js" crossorigin="anonymous"></script>

    <title>Adm. de Miembros</title>
</head>

<?php include 'Partials/navbar2.php' ?>

<body>
    <section class="ftco-section">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>ADMINISTRACIÓN DE MIEMBROS DEL GRUPO DE INVESTIGACIÓN</h2>
                            </div>
                            <div class="col-sm-4">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fa-solid fa-circle-plus"></i><span>Nuevo Miembro</span></a>
                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fa-solid fa-circle-minus"></i><span>Eliminar</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped" id="tblUser">
                            <thead class="thead-primary">
                                <tr>
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
                                                <a href="eliminar_prod.php?id_miembro=<?php echo $filas['id_miembro']; ?>" data-bs-toggle="modal" data-bs-target="#eliminarModal" title="Eliminar">
                                                    <span class="fa-solid fa-trash"></span>
                                                </a>
                                            </div>
                                        </td>
                                        <!-- Modal Eliminar -->
                                        <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de eliminar este miembro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <a href="eliminar_prod.php?id_miembro=<?php echo $filas['id_miembro']; ?>" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin del modal -->
                                    <?php } ?>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include_once 'Partials/footer.php' ?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function($) {
        $(' #tblUser').DataTable();
    });
</script>
<script src="Datatable/js/jquery.min.js"></script>
<script src="Datatable/js/popper.js"></script>
<script src="Datatable/js/bootstrap.min.js"></script>
<script src="Datatable/js/main.js"></script>

</html>