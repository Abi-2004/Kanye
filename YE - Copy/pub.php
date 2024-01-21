<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Noticia</title>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/pub.css">
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
        <h2>Publicar Noticia</h2>
        <form>
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="noticia">Noticia:</label>
                <textarea id="noticia" name="noticia" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Subir Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="pito()">
                <label class="btn-upload" for="foto">Seleccionar Foto</label>
                <span class="selected-file" id="selectedFile"></span>
            </div>
            <button type="submit" class="btn-upload">Publicar Noticia</button>
        </form>
    </div>

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
