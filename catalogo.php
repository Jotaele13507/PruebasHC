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
    <!-- Core theme catálogo CSS (includes Bootstrap)-->
    <link href="assets/dist/css/catalogostyles.css" rel="stylesheet" />

    <title>Hello, world!</title>
</head>

<?php include 'Partials/navbar2.php' ?>

<body>
    <!-- Inicio Header-->
    <div class="container">
        <header class="bg-dark py-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">CATÁLOGO</h1>
                <p class="lead fw-normal text-white-50 mb-0">Grupos de Investigación Aprobados</p>
            </div>
        </header>
    </div>
    <!-- Fin Header-->
    <!-- Inicio Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include 'conexion.php';
                $ret = mysqli_query($conexion, "select * from gruposinv");
                $num = mysqli_num_rows($ret);
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($ret)) {
                        $logogru = $row['dir_logo'] ?>


                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <?php if (empty($logogru)) { ?>
                                    <img class="card-img-top" src="img/logogrupo.png" alt="">
                                <?php } else { ?>
                                    <img class="card-img-top" src="media/logo_grupos/<?php echo ($row['id_grupo']) ?>/<?php echo ($row['dir_logo']) ?>" alt="">
                                <?php } ?>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo htmlentities($row['acronimo']); ?></h5>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btnp btnp_login" href="catalogoview.php?gid=<?php echo htmlentities($row['id_grupo']); ?>">Ver</a></div>
                                </div>
                            </div>
                        </div>
                <?php } //fin del while
                } //fin del if 
                ?>
            </div>
        </div>
    </section>
    <!-- Fin Section-->
</body>
<?php include_once 'Partials/footer.php' ?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>