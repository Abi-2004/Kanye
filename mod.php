<?php
if (!isset($_SESSION["user"])) {
    header("location: log.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/mod.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <h1>Modificar Noticia</h1>
    </header>
    <?php include_once "menu.php"; 
    
    if(isset($_GET['id_not']) && !empty($_GET['id_not'])) {
        include_once "bbdd.php";

        $idNoticia = $_GET['id_not'];

        $noticia = getNoticiaById($idNoticia);

        if ($noticia) {
    ?>
    <div class="container">
        <h2>Modificar Noticia</h2>
        <form action="modificar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_noticia" value="<?php echo $noticia['id_not']; ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contenido">Noticia:</label>
                <textarea id="contenido" name="contenido" required><?php echo $noticia['content']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Subir Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="pito()">
                <label class="btn-upload" for="foto">Seleccionar Foto</label>
                <span class="selected-file" id="selectedFile"></span>
            </div>
            <button type="submit" class="btn-upload" name="submit">Guardar Cambios</button>
        </form>
    </div>
    <?php
        } else {
            echo "No se encontró la noticia.";
        }
    } else {
        echo "ID de noticia no proporcionado.";
    }
    ?>

    <footer>
        <h4>COPYRIGHT © Abiral Dahal</h4>
        <h5>2024</h5>
    </footer>


    <script>
        function pito() {
            var fileInput = document.getElementById('foto');
            var selectedFile = document.getElementById('selectedFile');

            if (fileInput.files.length > 0) {
                selectedFile.innerHTML = 'Archivo seleccionado: ' + fileInput.files[0].name;
            } else {
                selectedFile.innerHTML = '';
            }
        }
    </script>
</body>
</html>
