<?php
    function connect_database()
    {
        $mysqli = new mysqli("44.195.114.107", "abi", "Dahal123", "kanye");
        if($mysqli -> connect_errno)
        {
            echo "Fallo en la conexión: ".$mysqli->connect_errno;
        }
        return $mysqli;
    }
    function noticia()
    {
        $mysqli = connect_database();
        
        $sql = "SELECT id_not, titulo, img FROM noticias";
        
        $sentencia = $mysqli->prepare($sql);
        if (!$sentencia) {
            echo "Fallo en la preparación de la sentencia: " . $mysqli->errno;
        }
        
        $ejecucion = $sentencia->execute();
        if (!$ejecucion) {
            echo "Fallo en la ejecucion: " . $mysqli->errno;
        }
        
        $noticias = array(); 
        
        $id_not = -1; 
        $titulo = "";
        $img = ""; 
        
        $vincular = $sentencia->bind_result($id_not, $titulo, $img);
        if (!$vincular) {
            echo "Fallo al vincular la sentencia: " . $mysqli->errno;
        }
        
        while ($sentencia->fetch()) {
            $noticia = array('id_noticia' => $id_not, 'titulo' => $titulo, 'img' => $img);
            $noticias[] = $noticia; 
        }
        
        $mysqli->close();
        return $noticias;
    }
    
    function checkDatabaseConnection()
    {
        $mysqli = new mysqli("44.195.114.107", "abi", "Dahal123", "kanye");
    
        // Check if there is a connection error
        if ($mysqli->connect_errno) {
            return false; // Connection failed
        }
    
        // Check if the server is alive
        if ($mysqli->ping()) {
            $mysqli->close(); // Close the connection
            return true; // Connection successful
        } else {
            return false; // Server is not responding
        }
    }
    
    // Example usage
    if (checkDatabaseConnection()) {
        echo "Connected to the database!";
    } else {
        echo "Failed to connect to the database!";
    }

    ?>
