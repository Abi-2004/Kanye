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
        $query = "INSERT INTO `autor` (`id_aut`, `nombre`, `apellido`, `usuario`, `password`, `email`) 
                  VALUES (NULL, '$nombre', '$apellido', '$usuario', '$hashed_password', '$email')";

        $result = mysqli_query($conn, $query);

        var_dump($query);
        // Verifica si la inserción fue exitosa
        if ($result) {
            // Registro exitoso, redirige a la página principal o a donde desees
            header("Location: index.php");
            exit;
        } else {
            // Error en la inserción, redirige a la página de registro con un mensaje de error
            header("Location: reg.php?error=1");
            exit;
        }

        // Cierra la conexión
        mysqli_close($conn);
    } else {
        // Error de conexión a la base de datos, redirige a la página de registro con un mensaje de error
        header("Location: reg.php?error=2");
        exit;
    }
}
?>
