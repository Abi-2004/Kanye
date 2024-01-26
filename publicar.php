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
var_dump($user);
$id = obtenerId($user) ;
var_dump($id);

var_dump("Insertado");
// Procesar el formulario si se envió
if (isset($_POST["submit"])) {
    // Recuperar valores del formulario
    $titulo = $_POST["titulo"];
    $contenido = $_POST["noticia"];

    // Verificar si se seleccionó una imagen
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
        // Directorio donde se guardarán las imágenes
        $directorioImagenes = "";

        // Obtener información de la imagen
        $nombreImagen = $_FILES["foto"]["name"];
        $rutaImagen = $directorioImagenes . $nombreImagen;

        // Mover la imagen al directorio de imágenes
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaImagen);
    } else {
        // Manejar el caso en el que no se haya seleccionado una imagen
        $rutaImagen = ""; // Puedes establecer un valor predeterminado o manejarlo según tus necesidades
    }

    // Insertar datos en la base de datos
    // (Asegúrate de tener una función similar a 'insertarNoticia' en tu archivo bbdd.php)
    var_dump("($titulo, $contenido, $rutaImagen, $id)");
    insertarNoticia($titulo, $contenido, $rutaImagen, $id);

    // Redireccionar a la página principal u otra página de éxito
    header("location: index.php");
    exit();
}
var_dump("no Insertado");
var_dump($titulo, $contenido, $rutaImagen, $user);
// Si el formulario no se envió o se intentó acceder directamente a publicar.php, redireccionar
//header("location: pub.php");
exit();
?>
