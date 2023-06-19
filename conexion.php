<?php
$servidor = "containers-us-west-90.railway.app:6003";
$usuario = "root";
$contrasena = "8154bv94kXd911yLmLy5";
$basedatos = "railway";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
