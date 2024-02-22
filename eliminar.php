<?php
    if(isset($_GET['id_not']) && !empty($_GET['id_not'])) {
        include_once "bbdd.php";

        $idNoticia = $_GET['id_not'];

        if(eliminarNoticia($idNoticia)) {
            header("Location: mis.php");
            exit();
        } else {
            echo "Error al eliminar la noticia.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
?>
