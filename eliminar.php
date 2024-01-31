<?php
    // Verificar si se recibió un ID válido
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        // Incluir el archivo con las funciones de base de datos
        include_once "funciones.php";

        // Obtener el ID de la noticia a eliminar desde la URL
        $idNoticia = $_GET['id'];

        // Llamar a la función para eliminar la noticia
        if(eliminarNoticia($idNoticia)) {
            // Si la eliminación fue exitosa, redirigir a la página de inicio o a una página de éxito
            header("Location: index.php");
            exit();
        } else {
            // Si la eliminación falló, mostrar un mensaje de error
            echo "Error al eliminar la noticia.";
        }
    } else {
        // Si no se recibió un ID válido, redirigir a la página de inicio o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }
?>
