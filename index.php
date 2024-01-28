<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YEEZYS</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5960283468400996"
     crossorigin="anonymous"></script>


</head>
<body>
    
    <header>
        <h1>Kanye West</h1>
    </header>


  



<?php include_once "menu.php"; ?>




    </div>
      

      <div class="ticker">
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
        <p>ULTIMAS NOTICIAS!!! </p>
      </div>


<?php 
include_once 'bbdd.php';
$noticias = noticia();
?>

<div class="newsblock">
    <?php
    include_once 'bbdd.php';
    $noticias = noticia(); 
    for ($i = 0; $i < 5; $i++) {
        echo '<div class="nb">';
        echo '<a href="notc.php?id_not='.$noticias[$i]['id_not'].'">'; 
        echo '<img src="'.$noticias[$i]['img'].'" alt="imagen de noticia">';
        echo '<h3>'.$noticias[$i]['titulo'].'</h3>';
        echo '</a>';
        echo '</div>';
    }
    ?>

</div>


<div id="seg">


<div class="merch">
<h2>Merch</h2>

  <div class="prod">
      <img src="img/merch1.png" >
      <h3> Camiseta YE</h3>
      <button id="butcomp" > Comprar </button>
  </div>

  <div class="prod">
      <img src="img/merch2.webp" >
      <h3>Yeezy</h3>
      <button id="butcomp" > Comprar </button>
  </div>

  <div class="prod">
      <img src="img/merch3.png" >
      <h3>Camiseta Jesus is king</h3>
      <button id="butcomp" > Comprar </button>
  </div>
  </div>

<div class="fechgir">
<h2>Proximas Giras</h2>
<p> Estas son las possibles proximas giras de Kanye West:</p>


<table> 
<tr> 
  <th>Lugar</th>
  <th>Fecha</th>
  <th>Entradas</th>
  </tr>


<tr>
    <td>BEC</td>
    <td>31/2/2027</td>
    <td><i class="bi bi-cart"></i></td>  
</tr>

<tr>
  <td>Santiago Bernabeu</td>
  <td>31/04/2030</td>
  <td><i class="bi bi-cart"></i></td> 
</tr>

<tr>
  <td>Bilbao Arena</td>
  <td>20/04/2069</td>
  <td><i class="bi bi-cart"></i></td> 
</tr>

</table> 

</div>

</div>

    <footer>
       
      <h4>COPYRIGHT © Abiral Dahal</h4>
      <h5>2024</h5>
    </footer>

</body>
</html>
