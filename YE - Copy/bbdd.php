<?php

function connect() {
    // Configuración de la conexión a la base de datos
    $host = '44.195.114.107';
    $username = 'abi';
    $password = 'Dahal123';
    $database = 'autor'; // Reemplaza con el nombre de tu base de datos

    // Crear una conexión a la base de datos
    $conn = new mysqli($host, $username, $password, $database);

    // Verificar si hay errores en la conexión
    if ($conn->connect_error) {
        // Imprimir el mensaje de error si la conexión falló
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Devolver la conexión para que pueda ser utilizada en otras partes del código
    return $conn;
}

// Llamar a la función connect y verificar el resultado
$conn = connect();

// Verificar si la conexión fue exitosa
if ($conn) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error de conexión a la base de datos.";
}
?>
