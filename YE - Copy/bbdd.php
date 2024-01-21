<?php

function connect() {
    // Configuración de la conexión a la base de datos
    $host = '44.195.114.107';
    $username = 'abi';
    $password = 'Dahal123';
    $database = 'kanye'; // Reemplaza con el nombre de tu base de datos

    // Crear una conexión a la base de datos
    $conn = new mysqli($host, $username, $password, $database);

    // Verificar si hay errores en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    echo "Conexión exitosa a la base de datos.";

    // Realizar operaciones con la base de datos aquí si es necesario

    // Cerrar la conexión al finalizar las operaciones
    $conn->close();
}

// Llamar a la función connect para probar la conexión
connect();
?>
