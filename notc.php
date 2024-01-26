<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YEEZYS</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/notc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <header>
        <h1>Noticia</h1>
    </header>

<?php include_once 'menu.php'; ?>

<div class="content">


<?php
include_once 'bbdd.php'; // Include your database connection file

if (isset($_GET['id_not'])) {
    $noticiaId = $_GET['id_not'];

    $noticia = getNoticiaById($noticiaId);

    // Display the title, image, and content
    echo '<h2 class="notit" >'.$noticia['titulo'].'</h2>';
    echo '<img class="notimg" src="img/'.$noticia['img'].'" alt="imagen de noticia">';
    echo '<p class="notcont" >'.$noticia['content'].'</p>';

    echo '<div class="author-box">';
    $id = $noticia['id_aut'];
    include_once 'bbdd.php';
    $nombre = datosById($id);

    echo '<h4> 🔔 Publicado por <b>'.$nombre.'</b></h4>';
    echo '</div>';
} else {
    // Handle the case when 'id_not' is not set.
    // For example, redirect to the homepage or display an error message.
    header("location: index.php");
}
?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5960283468400996"
     crossorigin="anonymous"></script>
<!-- aaaa -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5960283468400996"
     data-ad-slot="1342491894"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


    <footer>
       
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
      </footer>
  
  </body>
  </html>
  