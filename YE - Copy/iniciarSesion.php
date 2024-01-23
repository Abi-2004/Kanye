<?php
    session_start();
    include_once "bbdd.php";
    $sesionCorrecta = login($_POST["usuario"], $_POST["password"]);
    if($sesionCorrecta)
    {
        $_SESSION["user"] = $_POST["user"];
        header("location: index.php");
    } else
    {
        header("location: log.php");
    }
?>
