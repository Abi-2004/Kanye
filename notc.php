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
 // Include the functions file


if (isset($_GET['id_not'])) {
    var_dump($noticiaId);
    $noticiaId = $_GET['id_not'];*/

    $noticia = getNoticiaById("id_not");


    // Display the title, image, and content
    echo '<h2 class="notit" >'.$noticia['titulo'].'</h2>';
    echo '<img class="notimg" src="img/'.$noticia['img'].'" alt="imagen de noticia">';
    echo '<p class="notcont" >'.$noticia['content'].'</p>';
    
    echo '<div class="author-box">';
    echo '<h4> 🔔 Publicado por Abiral</h4>';
    echo '</div>';
    
} else {
    echo 'Invalid news ID.';
}

?>

    <footer>
       
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
      </footer>
  
  </body>
  </html>
  