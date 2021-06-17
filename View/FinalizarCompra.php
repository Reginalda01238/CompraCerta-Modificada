<?php
    session_start();

    require ("../Controller/ControladorCarrinho.php");

    $controladorCarrinho = new ControladorCarrinho();
    $controladorCarrinho->finalizarCompra();
?>