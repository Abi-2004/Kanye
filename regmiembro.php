<?php
include_once "bbdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $instrumento = $_POST["instrumento"];
    $fecha = $_POST["fecha"];
    $ciudad = $_POST["ciudad"];


    var_dump($nombre, $instrumento, $fecha, $ciudad);
    if (insertarMiembro($nombre, $instrumento, $fecha, $ciudad)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: No se pudo registrar el miembro.";
    }
}
?>