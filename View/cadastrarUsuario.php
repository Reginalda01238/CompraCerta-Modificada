<?php
    session_start();

    require ("../Controller/ControladorUsuario.php");

    $controladorUsuario = new ControladorUsuario();
    $controladorUsuario->cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["endereco"],
                                   $_POST["telefone"],$_POST["numcard"],$_POST["valcard"], $_POST["cvv"]);
?>