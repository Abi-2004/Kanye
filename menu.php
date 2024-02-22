<?php
echo '<div class="barra">
      <a href="index.php">Inicio</a>
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
            <li class="dropdown-li">
        <a href="#">Autor</a>
        <ul class="dropdown">';

        session_start();
          $user = $_SESSION["user"];
          if(isset($user) == true)
          {
             echo '<a href="pub.php">Publicar</a>';
          
          }
          
          
          if(isset($user) == true)
          {
            echo' <a href="mis.php">Mi noticias</a>';
          }else{
              echo '<a href="reg.php">Registrar</a>';
             }
        

         
          session_start();
          $user = $_SESSION["user"];
          if(isset($user) != true)
          {
             echo  '<a href="log.php">Log in </a> ';
          
          }else{
            echo  '<a href="logout.php">Salir </a> ';
          }
          
          session_start();
          $user = $_SESSION["user"];
          if(isset($user) == true)
          {
          echo' <a href="miembros.php">añadir miembros</a>';
          }
         
     echo'  </ul>
      </li>
      
    </div>';
?>
