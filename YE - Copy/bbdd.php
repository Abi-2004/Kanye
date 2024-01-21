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
        // Devolver false si la conexión falló
        return false;
    }

    // Realizar operaciones con la base de datos aquí si es necesario

    // Cerrar la conexión al finalizar las operaciones
    $conn->close();

    // Devolver true si la conexión fue exitosa
    return true;
}

// Llamar a la función connect y verificar el resultado
if (connect()) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error de conexión a la base de datos.";
}

?>
