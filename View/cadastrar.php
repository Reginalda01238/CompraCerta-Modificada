<?php
  session_start();
//require_once "../Model/Usuario.php";
//require_once "../Model/Conexao.php";

//$usuario = new Usuario;

?>

<!DOCTYPE html>
<html PT="BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css>
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
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <div class="menu-bar">
            <ul>
                <?php if (isset($_SESSION["nome"])){ ?>
                  <li><a href="MeuCarrinho.php"><i class="fas fa-shopping-cart"></i>Meu Carrinho</a></li>
                  <li><a href="historico.php">Histórico</a></li>
                <?php } ?>
                
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="compra.php">Compra</a></li>
            </ul>
        </div>    
    </div>

  <div id="form-Cad">
   <h1>Cadastrar</h1>
   <form method="POST" action="cadastrarUsuario.php">
    <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
    <input type="email" name="email" placeholder="Usuario"maxlength="40">
    <input type="password" name="senha" placeholder="Senha" maxlength="15">
    <input type="text" name="endereco" placeholder="endereco">
    <input type="tel" name="telefone" placeholder="telefone" maxlength="30">
    <input type="number" name="numcard" placeholder="Informe o número do Cartão">
    <input type="number" name="valcard" placeholder="Informe a validade do Cartão">
    <input type="number" name="cvv" placeholder="Informe o CVV do Cartão">
    <input type="submit" value="Cadastrar">
   </form>
  </div>
<?php

// verifica a instacia da variavel pelo metodo post, verifica se clicou em cadastro
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);  //addslashes impede comando malicioso
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verifica se está prenchida
    if(!empty($nome) && !empty($telefone) && !empty($email) 
    && !empty($senha) && !empty($confirmarSenha)) //verifica se não está vazio através do empty
    {
        $usuario->conectar("compracerta", "localhost", "root", "");
        if($usuario->msgErro == "")// está certo
        {
          if($senha == $confirmarSenha)
          {
            if($usuario->cadastrar($nome, $telefone, $email, $senha))
            {
              //echo "Cadastrado com sucesso! Acesse para entrar!";
              ?>
              <div id="msg-sucesso">
              Cadastrado com sucesso! Acesse para entrar!
              </div>
              <?php
            }
            else
            {
              //echo "Email já cadastrado";
              ?>
              <div class="msg-erro">
               Email já cadastrado
              </div>
              <?php
            }
          }
          else
          {
            //echo "Senha e confirmar senha não conferem";
            ?>
            <div class="msg-erro">
            Senha e confirmar senha não conferem"
            </div>
            <?php
          }
        }
        else
        {
          //echo  "Erro:" .$usuario->msgErro;
          ?>
          <div class="msg-erro">
            <?php echo "Erro:" .$usuario->msgErro;?>
          </div>
          <?php
        }
    }else
    {
      //echo "Preencha todos os campos!";
      ?>
      <div class="msg-erro">
      Preencha todos os campos
      </div>
      <?php
    }
}

?>
</body>
</html>