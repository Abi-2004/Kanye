<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/fan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Include the reCAPTCHA Enterprise API script -->

    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lf8X1wpAAAAAPP0WUdum8IHHQ_J2CoRhO2HDpLd"></script>
    
  </head>
<body>
    
    <header>
        <h1>Fan club</h1>
    </header>

    <?php include_once "menu.php"; ?>

    <div class="container">
        <h2>Registro de Usuario</h2>
        <form id="registration-form" action="registrar.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="g-recaptcha" data-sitekey="6Lf8X1wpAAAAAPP0WUdum8IHHQ_J2CoRhO2HDpLd"></div>

            <button type="button" onclick="onClick(event)" class="btn-register">Registrar</button>

        </form>
    </div>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>
<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6Lf8X1wpAAAAAPP0WUdum8IHHQ_J2CoRhO2HDpLd', {action: 'submit'});
      document.getElementById("registration-form").submit();
    });
  }
</script>

</body>
</html>
