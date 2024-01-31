<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YEEZYS</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/mis.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <h1>Mis noticias</h1>
    </header>
    <?php include_once "menu.php"; ?>

    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <?php
            // Iniciar la sesión
            session_start();

            // Verificar si el usuario está autenticado
            if(isset($_SESSION["user"])) {
                // Obtener el usuario de la sesión
                $user = $_SESSION["user"];
                // Obtener el ID del usuario
                $id = obtenerId($user);
                include_once "bbdd.php";
                $noticiasUsuario = getNoticiasByUsuario($id);

                // Iterar sobre las noticias y mostrarlas en la tabla
                foreach ($noticiasUsuario as $noticia) {
                    echo "<tr>";
                    echo "<td>" . $noticia['foto'] . "</td>";
                    echo "<td>" . $noticia['titulo'] . "</td>";
                    echo "<td>" . $noticia['contenido'] . "</td>";
                    echo "<td><a href='modificar.php?id=" . $noticia['id'] . "'>Modificar</a></td>";
                    echo "<td><a href='eliminar.php?id=" . $noticia['id'] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
                header("Location: log.php");
                exit(); // Detener la ejecución del script
            }
        ?>
    </table>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>
</body>
</html>
