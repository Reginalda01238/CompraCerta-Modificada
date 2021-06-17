<?php session_start();?>

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
                <li><a href="carrinho.php"><i class="fas fa-shopping-cart"></i>Meu Carrinho</a></li>
                <li><a href="historico.php">Histórico</a></li>
            <?php } ?>
            
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
        <?php
            require ("../Controller/ControladorProduto.php");

            $controladorProduto = new ControladorProduto();
            $produtoResultado = $controladorProduto->consultar();

            while ($dados = mysqli_fetch_object($produtoResultado)) {
                            $arraylistaprodutos[] = array("nome" => $dados->nome,
                                                    "valor" => $dados->valor,
                                                    "id_produto" => $dados->id_produto);
            }
            //print_r($arraylistaprodutos);
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($arraylistaprodutos); $i++) { ?>
                    <tr>
                        <form action="processarCarrinho.php" method="post">
                        <td><?php echo $arraylistaprodutos[$i]["nome"]; ?></td>
                        <td><?php echo $arraylistaprodutos[$i]["valor"]; ?></td>
                        <td>
                            <input hidden type="number" name="id_produto" value="<?php echo $arraylistaprodutos[$i]['id_produto']; ?>">
                            <input hidden type="text" name="valor" value="<?php echo $arraylistaprodutos[$i]['valor']; ?>">
                            <button type="submit" style="background-color: green; color: white;">Colocar No Carrinho</button>
                        </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>
</html>