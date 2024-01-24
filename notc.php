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

    <div class="barra">
        <a href="index.html">Inicio</a>
        <li class="dropdown-li">
          <a href="gira.html">Gira</a>
          <ul class="dropdown">
            <a href="gira.html">Gira completa</a>
            <a href="galeria.html">Galería</a>
            <a href="entrada.html">Compra de entradas</a>
          </ul>
        </li>
        <a href="bio.html">BioGrafia</a>
        <a href="disco.html">Discografia</a>
        <a href="fan.html">Fanclub</a>
      </div>

<div class="content">

    <div class="notit" >
        <H2>
            Titulo de la noticia
        </H2>
    </div>

    <?php
include_once 'bbdd.php'; // Include your database connection file
 // Include the functions file
 var_dump(hola);

if (isset($_GET['id_not'])) {
    var_dump($noticiaId);
    $noticiaId = $_GET['id_not'];
    $noticia = getNoticiaById($noticiaId);

    // Display the title, image, and content
    echo '<h2>'.$noticia['titulo'].'</h2>';
    echo '<img src="img/'.$noticia['img'].'" alt="imagen de noticia">';
    echo '<p>'.$noticia['contenido'].'</p>';
    
    // Author box
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
  