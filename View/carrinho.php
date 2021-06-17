<?php
    session_start();
    require ("../Controller/ControladorCarrinho.php");

    $controladorCarrinho = new ControladorCarrinho();
    $itenscarrinho = $controladorCarrinho->montarCarrinho();
    print_r($itenscarrinho);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPRA CERTA</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/7c890cd723.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="top-nav-bar">
      
      <a href="https://www.google.com.br/"><div class="search-box"></a>
        <i class="fas fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fas fa-times" id="close-btn" ondblclick="closemenu()"></i>
        <a href="index.php"><img src="imagem/logo.png" class="logo"></a>
        <input type="text" class="form-control">
        <span class="input-group-text"><i class="fas fa-se<arch"></i></span>
    </div>
    <div class="menu-bar">
        <ul>
            <?php if (isset($_SESSION["nome"])){ ?>
                <li>Olá, <?php echo $_SESSION["nome"]; ?></li>
            <?php } ?>
            <li><a href="carrinho.php"><i class="fas fa-shopping-cart"></i>Meu Carrinho</a></li>
            <li><a href="historico.php">Histórico</a></li>
            <?php if (!isset($_SESSION["idusuario"])) { ?>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="login.php">Login</a></li>
            <?php } else { ?>
                <li><a href="sair.php">Sair</a></li>
            <?php } ?>
            <li><a href="listarprodutos.php">Produtos</a></li>
        </ul>
    </div>    
    
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$itenscarrinho) { ?>
                    <tr>
                        <td>Não há produtos no carrinho</td>
                    </tr>
                <?php } 
                    else { 
                        for ($i = 0; $i < count($itenscarrinho); $i++) { ?>
                            <tr>
                                <td><?php echo $itenscarrinho[$i]["nome"]; ?></td>
                                <td><?php echo $itenscarrinho[$i]["valor_produto"]; ?></td>
                                <td>
                                </td>
                            </tr>
                <?php } } ?>
            </tbody>
        </table>
        <center>
            <?php if ($itenscarrinho) { ?>
                <p>Valor Total: <?php echo "R$" . $itenscarrinho[0]["valortotal"]; ?></p>
                <form action="FinalizarCompra.php" method="post">    
                    <button type="submit" style="background-color: green; color: white;">Finalizar compra</button>
                </form>
            <?php } ?>
        <center>
    </div>
</body>
</html>