<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["user"])) {
    header("location: log.php");
    exit(); 
}

include_once "bbdd.php";

$user = $_SESSION["user"];
$id = obtenerId($user);

if (isset($_POST["submit"]) && isset($_POST["id_noticia"])) {
    $idNoticia = $_POST["id_noticia"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        $directorioImagenes = "img/";
    
        $nombreImagen = basename($_FILES["foto"]["name"]);
        $extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
        $nombreImagenSinExtension = basename($nombreImagen, "." . $extension);
        $nombreImagen = $nombreImagenSinExtension . "_" . date("Ymd_His") . "." . $extension;
    
        $rutaImagen = $directorioImagenes . $nombreImagen;
    
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaImagen);
    } else {
        $noticia = getNoticiaById($idNoticia);
        $rutaImagen = $noticia['img'];
    }

    modificarNoticia($idNoticia, $titulo, $contenido, $rutaImagen);

    header("location: index.php");
    exit();
} else {
    header("location: index.php");
    exit();
}
?>
