<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["user"])) {
    header("location: log.php");
    exit(); // Detener la ejecución del script
}

// Conectar a la base de datos (asegúrate de tener el archivo bbdd.php incluido)
include_once "bbdd.php";

// Obtener datos del usuario
$user = $_SESSION["user"];
$id = obtenerId($user);

// Verificar si se recibió un ID de noticia y se envió el formulario
if (isset($_POST["submit"]) && isset($_POST["id_noticia"])) {
    // Recuperar valores del formulario
    $idNoticia = $_POST["id_noticia"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    // Verificar si se seleccionó una imagen nueva
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        $directorioImagenes = "img/";

        // Obtener información de la imagen
        $nombreImagen = $_FILES["foto"]["name"];
        $rutaImagen = $directorioImagenes . $nombreImagen.date("Ymd_His") . "_" . explode(".",microtime(true))[1];

        // Mover la imagen al directorio de imágenes
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaImagen);
    } else {
        // Si no se selecciona una imagen nueva, conservar la imagen existente
        $noticia = getNoticiaById($idNoticia);
        $rutaImagen = $noticia['img'];
    }

    // Actualizar los datos de la noticia en la base de datos
    modificarNoticia($idNoticia, $titulo, $contenido, $rutaImagen);

    // Redireccionar a la página principal u otra página de éxito
    header("location: index.php");
    exit();
} else {
    // Si no se recibió un ID de noticia o el formulario no se envió, redireccionar
    header("location: index.php");
    exit();
}
?>
