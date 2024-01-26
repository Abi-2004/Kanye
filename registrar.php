<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include your database connection file
include 'bbdd.php';

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $captcha_token = $_POST['captcha-token']; // Retrieve CAPTCHA token from the form

    // Verify the CAPTCHA token using the reCAPTCHA Enterprise API
    $recaptcha_secret_key = 'YOUR_RECAPTCHA_SECRET_KEY'; // Replace with your reCAPTCHA secret key
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret_key . '&response=' . $captcha_token);
    $response_data = json_decode($verify_response);

    // Check if CAPTCHA verification succeeded
    if ($response_data && $response_data->success) {
        // CAPTCHA verification successful, proceed with database operation
        $conexion = connect_database();

        if ($conexion) {
            // Escape special characters to prevent SQL injection
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
                exit; // Terminate script execution after redirection
            } else {
                echo "Error al insertar datos: " . mysqli_error($conexion);
            }

            // Close the database connection
            mysqli_close($conexion);
        } else {
            echo "Error de conexión a la base de datos";
        }
    } else {
        // CAPTCHA verification failed, redirect back to the registration form
        echo "Error: CAPTCHA verification failed";
        header("location: registrar.php");
        exit; // Terminate script execution after redirection
    }
}
?>
