<?php


$user = 'root';
$password = '';
$db = 'g_inv';
$localhost = 'localhost';

$conexion = mysqli_connect($localhost, $user, $password, $db);


if ($conexion->connect_errno) {
    die("Fallo la conexión : (" . $conexion->mysqli_connect_errno()
        . ") " . $conexion->mysqli_connect_error());
}
?>