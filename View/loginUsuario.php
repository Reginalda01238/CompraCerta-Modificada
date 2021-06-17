<?php
    session_start();

    require ("../Controller/ControladorUsuario.php");

    $loginUsuario = new ControladorUsuario();
    $loginUsuario->login($_POST["email"], $_POST["senha"]);
?>