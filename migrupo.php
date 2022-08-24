<!doctype html>
<html lang="en">

<?php $gid = "1";
//echo $gid;
?>
<!-- Consulta de información del grupo de investigación -->
<?php
include "conexion.php"; //Conexión a la base de datos
$id_grupo     = "1"; // Guardamos el id del usuario en sesión dentro de una variable
// $sql            = "SELECT * FROM gruposinv where id_grupo ='" . $id_usuario . "'"; //Realizamos el query a la base de datos
$ret = mysqli_query($conexion, "select gruposinv.*,usuarios.id as uid, usuarios.nombre as unombre from gruposinv join usuarios on usuarios.id=gruposinv.id_usuario where gruposinv.id_grupo='$id_grupo'");
//$ret = mysqli_query($con, "select ordertrackhistory.*,admin.id as aid,admin.username as auser from ordertrackhistory join admin on admin.id=ordertrackhistory.adminID where ordertrackhistory.orderId='$oid'");

// comienza un bucle que leerá todos los registros existentes
//$result = mysqli_query($conexion, $ret); // Ejecuta el Query
while ($row = mysqli_fetch_array($ret)) // $row es un array con todos los campos existentes en la tabla
{ ?>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap IconCSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons custom CSS -->
        <link href="assets/dist/css/botones.css" rel="stylesheet">
        <!-- Form custom CSS -->
        <link href="assets/dist/css/formValidation.css" rel="stylesheet">
        <!-- Font Awesome Script from icons -->
        <script src="https://kit.fontawesome.com/9b7d0e963c.js" crossorigin="anonymous"></script>
        <!-- Main CSS-->
        <link href="assets/dist/css/migrupo.css" rel="stylesheet" media="all">
        <!-- Bootstrap Datatables custom CSS -->
        <link href="assets/dist/css/datatables2.css" rel="stylesheet">

        <title>Formularios</title>
    </head>
    <?php include 'Partials/navbar2.php' ?>

    <body>
        <div class="container">
            <!-- Column -->
            <div class="card"> <img class="card-img-top" src="media/foto_grupos/1/bg-head-03.JPG" alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="media/logo_grupos/7/7.jpg" alt="user" class="rounded_corners"></div>
                    <h2 class="m-b-0"><?php echo $row['nombre_grupo'] ?> - <?php echo $row['acronimo'] ?></h2>
                    <h4 class="m-b-0"><?php echo $row['unidad_acad'] ?>
                </div>
                <div class="container">
                    <div class="card-body">
                        <form action="" class="row g-3 form">

                            <div class=" col-md-6">
                                <div class="form-field">
                                    <label for=""><b>Coordinador: </b></label>
                                    <input type="text" class="form-control" value="<?php echo $row['unombre'] ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-field">
                                    <label for=""><b>Año de Creación:</b></label>
                                    <input type="text" class="form-control" value="<?php echo $row['fecha_creacion'] ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-field">
                                    <label class=""><b>Objetivos: </b></label>
                                    <textarea class="form-control" rows="2" disabled><?php echo $row['obj_grupo'] ?></textarea>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h2>MIEMBROS DEL GRUPO DE INVESTIGACIÓN</h2>
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
                                                    <?php } ?>
                                                    </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h2>PROYECTOS DE INVESTIGACIÓN</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table table-striped" id="tblUser">
                                            <thead class="thead-primary">
                                                <tr>
                                                    <th>TÍtulo de la Investigación</th>
                                                    <th style="width: 50%">Objetivos</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include "conexion.php"; //Conexión a la base de datos
                                            $id_grupop = "1";
                                            //$id_usuariot = $_SESSION["usuario"]['id']; // Guardamos el id del usuario en sesión dentro de una variable
                                            $sentencia = "SELECT * FROM proyegi where id_grupo = $id_grupop"; //Realizamos el query a la base de datos
                                            // comienza un bucle que leerá todos los registros existentes
                                            $resultado = mysqli_query($conexion, $sentencia); // Ejecuta el Query
                                            while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php echo $filas['tit_inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $filas['obj_inv']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $filas['estado']; ?>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php
} // fin del bucle de instrucciones

// Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
?>
<?php include_once 'Partials/footer.php' ?>
<!-- Script de validacion de los inputs -->
<script src="assets/dist/js/app.js"></script>
<!-- Bootstrap Bundle with Popper / Hace funcionar el Navbar -->
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