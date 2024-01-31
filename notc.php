<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YEEZYS</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/notc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5960283468400996" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <h1>Noticia</h1>
    </header>

    <?php include_once "menu.php"; ?>

    <div class="content">
        <?php
        include_once 'bbdd.php';

        if (isset($_GET['id_not'])) {
            $noticiaId = $_GET['id_not'];

            $noticia = getNoticiaById($noticiaId);

            // Display the title, image, and content
            echo '<h2 class="notit">'.$noticia['titulo'].'</h2>';
            echo '<img class="notimg" src="'.$noticia['img'].'" alt="imagen de noticia">';
            echo '<p class="notcont">'.$noticia['content'].'</p>';

            echo '<div class="author-box">';
            $id = $noticia['id_aut'];
            include_once 'bbdd.php';
            $nombre = datosById($id);

            echo '<h4> 🔔 Publicado por <b>'.$nombre.'</b></h4>';
            echo ' <h4> Fecha: '.$noticia['fecha'].'</h4>';
            echo '</div>';
        } else {
            header("location: index.php");
        }
        ?>
    </div>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>

</body>

</html>
