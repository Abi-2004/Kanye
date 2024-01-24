<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>

    </style>
</head>
<body>
    
    <header>
        <h1>Fan club</h1>
    </header>

    <?php include_once "menu.php"; ?>

    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="iniciarSesion.php" >
            <div class="form-group">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="user" placeholder="Escriba el usuario" />
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>
    </div>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>
</body>
</html>
