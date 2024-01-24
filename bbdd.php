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
    function noticia() {
        $mysqli = connect_database();
        
        $sql = "SELECT id_not, titulo, img FROM noticias ORDER BY id_not DESC";
    
        // Prepare the SQL statement
        $sentencia = $mysqli->prepare($sql);
        if (!$sentencia) {
            die("Fallo en la preparación de la sentencia: " . $mysqli->errno);
        }
    
        // Execute the statement
        $ejecucion = $sentencia->execute();
        if (!$ejecucion) {
            die("Fallo en la ejecución: " . $sentencia->error);
        }
    
        // Bind the result variables
        $vincular = $sentencia->bind_result($id_not, $titulo, $img);
        if (!$vincular) {
            die("Fallo al vincular la sentencia: " . $sentencia->error);
        }
    
        // Fetch the results into an array
        $noticias = array();
        while ($sentencia->fetch()) {
            $noticia = array('id_not' => $id_not, 'titulo' => $titulo, 'img' => $img);
            $noticias[] = $noticia;
        }
    
        // Close the statement and database connection
        $sentencia->close();
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
    
    function getNoticiaById($id) {
        $mysqli = connect_database();
        
        $sql = "SELECT id_not, titulo, img, conte FROM noticias WHERE id_not = ? LIMIT 1";
        
        $sentencia = $mysqli->prepare($sql);
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
    
        $sentencia->bind_result($id_not, $titulo, $img, $cont);
        $sentencia->fetch();
    
        $noticia = array('id_not' => $id_not, 'titulo' => $titulo, 'img' => $img, 'cont' => $cont);
    
        $mysqli->close();
    
        return $noticia;
    }



    ?>
