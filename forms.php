<!doctype html>
<html lang="en">

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

    <title>Formularios</title>
</head>
<?php include 'Partials/navbar2.php' ?>

<body>
    <!-- Inicio Header-->
    <div class="container">
        <header class="bg-dark  py-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Registro Miembro</h1>
            </div>
        </header>
    </div>
    <!-- Fin Header-->
    <!-- Inicio Formulario-->
    <div class="container">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <form id="signup" class="row g-3 form needs-validation" novalidate>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label for="">Nombre:</label>
                            <input type="text" name="" id="firstname" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label for="">Apellido:</label>
                            <input type="text" name="" id="lastname" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label for="">Cédula:</label>
                            <input type="text" name="" id="cedula" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-field">
                            <label for="">Estatus:</label>
                            <select name="status" id="status" class="form-select" required aria-label="select example">
                                <option value="">Elije una opción</option>
                                <option value="Docente">Docente</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Administrativo">Administrativo</option>
                            </select>
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-field">
                            <label for="">Grado:</label>
                            <select id="grado" name="grado" class="form-select" required aria-label="select example">
                                <option value="">Elije una opción</option>
                                <option value="Licendiado(a)">Licendiado(a)</option>
                                <option value="Magíster">Magíster</option>
                                <option value="Doctor(a)">Doctor(a)</option>
                            </select>
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-field">
                            <label for="">Área de Interés:</label>
                            <input type="text" name="" id="interes" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label for="">Teléfono:</label>
                            <input type="text" name="" id="telefono" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-field">
                            <label for="">Correo Electrónico:</label>
                            <input type="text" name="" id="email" class="form-control" required autocomplete="off">
                            <small></small>
                        </div>
                    </div>

                    <div class="form-field">
                        <input type="submit" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include_once 'Partials/footer.php' ?>
<!-- Script de validacion de los inputs -->
<script src="assets/dist/js/app.js"></script>
<!-- Bootstrap Bundle with Popper / Hace funcionar el Navbar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>