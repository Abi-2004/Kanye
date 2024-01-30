<?php
    function connect_database()
    {
        $mysqli = new mysqli("44.214.58.239", "abi", "Dahal123", "kanye");
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


    
    function obtenerId($user) {
        $mysqli = connect_database();
    
        // Escapar caracteres para prevenir SQL injection
        $user = mysqli_real_escape_string($mysqli, $user);
    
        // Crear la consulta SQL con una sentencia preparada
        $sql = "SELECT id_aut FROM autor WHERE usuario = ?";
    
        // Preparar la sentencia
        $stmt = $mysqli->prepare($sql);
    
        // Verificar si la preparación fue exitosa
        if ($stmt === FALSE) {
            die("Error al preparar la consulta: " . $mysqli->error);
        }
    
        // Vincular el parámetro
        $stmt->bind_param("s", $user);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $result = $stmt->get_result();
    
        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Obtener el resultado como un array asociativo
            $row = $result->fetch_assoc();
            // Cerrar la sentencia preparada
            $stmt->close();
            // Cerrar la conexión
            $mysqli->close();
            // Devolver el valor de id_aut
            return $row['id_aut'];
        } else {
            // Cerrar la sentencia preparada
            $stmt->close();
            // Cerrar la conexión
            $mysqli->close();
            // En caso de no encontrar resultados, puedes devolver false o cualquier otro indicador
            return false;
        }
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
    
        $sentencia->close();  //Close the statement//
        $mysqli->close();
        
        $nombreCompleto = $nombre . ' ' . $apellido;
        return $nombreCompleto;
    }


    function datosById($id_aut)
{
    $mysqli = connect_database();

    $sql = "SELECT nombre, apellido FROM autor WHERE id_aut = ?";

    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia" . $mysqli->errno;
    }

    $asignar = $sentencia->bind_param("i", $id_aut);
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

    $sentencia->close();
    $mysqli->close();

    $nombreCompleto = $nombre . ' ' . $apellido;
    return $nombreCompleto;
}


function insertarNoticia($titulo, $contenido, $imagen, $idUsuario)
{
    $mysqli = connect_database();

    $fecha = date("Y-m-d");


    $sql = "INSERT INTO noticias (titulo, content, img, id_aut,fecha) VALUES (?, ?, ?, ?, ?)";

    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
        die("Fallo en la preparación de la sentencia: " . $mysqli->errno);
    }

    // Vincular los parámetros y ejecutar la consulta
    $sentencia->bind_param("ssssi", $titulo, $contenido, $imagen, $idUsuario, $fecha);

    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        die("Fallo en la ejecución: " . $mysqli->errno);
    }

    // Cerrar la sentencia y la conexión
    $sentencia->close();
    $mysqli->close();
}

    

function getNoticiaById($id) {
    $mysqli = connect_database();
    
    $sql = "SELECT id_not, titulo, img, content, id_aut, fecha FROM noticias WHERE id_not = ?";
    
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
        die("Fallo en la preparación de la sentencia: " . $mysqli->errno);
    }
    
    $sentencia->bind_param("i", $id);
    
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        die("Fallo en la ejecución: " . $sentencia->error);
    }
    
    $vincular = $sentencia->bind_result($id_not, $titulo, $img, $content, $id_aut, $fecha);
    if (!$vincular) {
        die("Fallo al vincular la sentencia: " . $sentencia->error);
    }
    
    $sentencia->fetch();
    
    $noticia = array('id_not' => $id_not, 'titulo' => $titulo, 'img' => $img, 'content' => $content, 'id_aut' => $id_aut, 'fecha' => $fecha);
    
    $sentencia->close();
    $mysqli->close();
    
    return $noticia;
}
?>
    


    ?>
