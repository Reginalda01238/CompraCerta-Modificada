<?php
    session_start();
    require ("../Model/Carrinho.php");

    //print_r($_POST);
    $produtocomprado[] = array("id_produto" => $_POST["id_produto"],
                         "valor" => $_POST["valor"]);
    
    $adicionarNoCarrinho = new Carrinho();
    $adicionarNoCarrinho->colocarNoCarrinho($produtocomprado);
?>