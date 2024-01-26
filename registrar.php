<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'bbdd.php';
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $conexion = connect_database();

    if ($conexion) {
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $apellido = mysqli_real_escape_string($conexion, $apellido);
        $usuario = mysqli_real_escape_string($conexion, $usuario);
        $password = mysqli_real_escape_string($conexion, $password);
        $email = mysqli_real_escape_string($conexion, $email);

        // Your INSERT query for 'autor' table
        $query = "INSERT INTO `autor` (`id_aut`, `usuario`, `nombre`, `apellido`, `password`, `email`) 
                  VALUES (NULL, '$usuario', '$nombre', '$apellido', '$password', '$email')";

        // Execute the INSERT query
        $resultado = mysqli_query($conexion, $query);

        // Check if the INSERT query was successful
        if ($resultado) {
            echo "Datos insertados correctamente";
            // You may redirect to another page after successful insertion
            header("location: index.php");
        } else {
            echo "Error al insertar datos: " . mysqli_error($conexion);
            // Redirect to the original form page in case of an error
            header("location: registrar.php");
        }

        // Close the database connection
        mysqli_close($conexion);
    } else {
        echo "Error de conexión a la base de datos";
    }
}
?>