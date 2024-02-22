<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Miembros</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/fan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <header>
        <h1>Fan club</h1>
    </header>

    <?php include_once "menu.php"; ?>

    <div class="container">
        <h2>Registro de Miembros</h2>
        <form id="registration-form" action="regmiembro.php" method="post" onsubmit="return validateRecaptcha()">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="instrumento">Instrumento:</label>
                <input type="text" id="instrumento" name="instrumento" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Nacimiento:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lenhl4pAAAAAIFx3kZrj-q31mxLEpmuLLcvY_HH"></div>
             
            <button type="submit" class="btn-register">Registrar</button>

        </form>
    </div>

    <script>
    function validateRecaptcha() {
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
            
            Swal.fire({
                icon: 'warning',
                title: 'Verificación reCAPTCHA',
                text: 'Por favor, completa la verificación reCAPTCHA para demostrar que eres humano.',
            });
            return false; // Prevent form submission
        }

        // If the reCAPTCHA is verified, you can optionally do further validation here

        return true; // Allow form submission
    }
    </script>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>


</body>
</html>
