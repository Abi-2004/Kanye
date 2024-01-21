<?php

function connect() {
    $host = '44.195.114.107';
    $username = 'abi';
    $password = 'Dahal123';
    $database = 'kanye'; 

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    echo "Conexión exitosa a la base de datos.";


    $conn->close();
}

connect();
?>
