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
        
        $sql = "SELECT id_not, titulo, img FROM noticias ORDER BY id_not DESC " ;
        
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
    


    function login($user, $password)
    {
        $mysqli = connect_database();

        $sql = "SELECT usuario FROM autor WHERE usuario = ? 
            AND password = ?";
            
        $sentencia = $mysqli->prepare($sql);
        if(!$sentencia)
        {
            echo "Fallo en la preparación de la sentencia".$mysqli->errno;
        }

        $asignar = $sentencia->bind_param("ss", $user, $password);
        if(!$asignar)
        {
            echo "Fallo en la asignación ".$mysqli->errno;
        }

        $ejecucion = $sentencia->execute();
        if(!$ejecucion)
        {
            echo "Fallo en la ejecución ".$mysqli->errno;
        }

        $usuario = "";
        $vincular = $sentencia->bind_result($usuario);
        if(!$vincular)
        {
            echo "Fallo al asociar parámetros ".$mysqli->errno;
        }

        $result = false;
        if($sentencia->fetch())
        {
            $result = true;
        }

        $mysqli->close();
        return $result;
    }
    function datos($user)
    {
        $mysqli = connect_database();
    
        $sql = "SELECT nombre, apellido FROM autor WHERE usuario = ?";
    
        $sentencia = $mysqli->prepare($sql);
        if (!$sentencia) {
            echo "Fallo en la preparación de la sentencia" . $mysqli->errno;
        }
    
        $asignar = $sentencia->bind_param("s", $user);
        if (!$asignar) {
            echo "Fallo en la asignación " . $mysqli->errno;
        }
    
        $ejecucion = $sentencia->execute();
        if (!$ejecucion) {
            echo "Fallo en la ejecución " . $mysqli->errno;
        }
    
        $nombre = "";
        $apellido = "";
        $vincular = $sentencia->bind_result($nombre, $apellido);
        if (!$vincular) {
            echo "Fallo al asociar parámetros " . $mysqli->errno;
        }
    
        $sentencia->fetch(); // Fetch the result
    
        $sentencia->close(); // Close the statement
        $mysqli->close();
        
        // Concatenar nombre y apellido y devolver la cadena
        $nombreCompleto = $nombre . ' ' . $apellido;
        return $nombreCompleto;
    }
    




    ?>
