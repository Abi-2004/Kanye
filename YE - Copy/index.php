<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YEEZYS</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        for ($i = 0; $i < 5; $i++) {
            echo '<div class="nb">';
            echo '  <img src="img/'.$noticias[$i]['img'].'" alt="imagen de noticia">';
            echo '  <H3>'.$noticias[$i]['titulo'].'</H3>';
            echo '</div>';
        }
        ?>
    </div>
<!--
    <div class="nb" >
      <img src="img/noti1.webp" alt="">
      <H3>La transformación de Bianca Censori: el antes y el después de su relación con Kanye West</H3>
    </div>
    <div class="nb" >
      <img src="img/noti2.jpg" alt="">
      <h3>Ni una ni dos, sino tres ex de Kanye West coinciden en una gala de premios</h3>
    </div>
    <div class="nb" >
      <img src="img/noti3.webp" alt="">
      <h3>Kanye West pagará a Kim Kardashian más de 190.000 euros al mes de pensión tras llegar a un acuerdo de divorcio</h3>
    </div>
    <div class="nb" >
      <img src="img/noti3.webp" alt="">
      <h3>Kanye West pagará a Kim Kardashian más de 190.000 euros al mes de pensión tras llegar a un acuerdo de divorcio</h3>
    </div>
    <div class="nb" >
      <img src="img/noti3.webp" alt="">
      <h3>Kanye West pagará a Kim Kardashian más de 190.000 euros al mes de pensión tras llegar a un acuerdo de divorcio</h3>
    </div>
-->
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
