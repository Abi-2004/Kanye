<?php
// Incluye tu archivo bbdd.php que contiene la función connect
include_once "bbdd.php";

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Conecta a la base de datos
    $conn = connect();

    // Verifica si la conexión fue exitosa
    if ($conn) {
        // Escapa los datos para prevenir inyecciones SQL
        $nombre = mysqli_real_escape_string($conn, $nombre);
        $apellido = mysqli_real_escape_string($conn, $apellido);
        $usuario = mysqli_real_escape_string($conn, $usuario);
        $password = mysqli_real_escape_string($conn, $password);
        $email = mysqli_real_escape_string($conn, $email);

        // Hash de la contraseña (puedes usar funciones más seguras)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Realiza la inserción en la base de datos
        $query = "INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `email`) 
                  VALUES (NULL, '$nombre', '$apellido', '$usuario', '$hashed_password', '$email')";

        $result = mysqli_query($conn, $query);

        // Verifica si la inserción fue exitosa
        if ($result) {
            echo "Registro exitoso. ¡Bienvenido, $nombre!";
        } else {
            echo "Error al registrar. Por favor, inténtalo de nuevo.";
        }

        // Cierra la conexión
        mysqli_close($conn);
    } else {
        echo "Error de conexión a la base de datos.";
    }
}
?>
