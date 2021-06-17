<?php
  session_start();
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
            <span class="input-group-text"><i class="fas fa-search"></i></span>
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
    </div>
    
    <!--------Menus ------>

<section class="header">
  <div class="side-menu" id="side-menu">
      <ul>
      <a href="historico.php"><li>Informações<i class="fas fa-angle-right"></i></a>
        
          <ul>
            <a href="CadPedido.php"><li>Consultar Compra</li></a>
            <a href="AvaliacaoCli.php"><li>Avaliar Compra</li></a>
            <a href="CadPedido.php"><li>Alterar Compra</li></a>
            <a href="CadPedido.php"> <li>Excluir Compra</li></a>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Telefonia<i class="fas fa-angle-right"></i></a>
          <ul>
            <li>Motorola</li>
            <li>Xiaomi</li>
            <li>Sansung</li>
            <li>Iphone</li>
        </ul>
        </li>  
        <a href="indexCarrinho.php"><li>Informatica<i class="fas fa-angle-right"></i>
          <ul>
            <li>Notebook</li>
            <li>Teclado</li>
            <li>Tablets</li>
            <li>Desktop</li>
        </ul>
        </li>
        <a href="indexCarrinho.php"><li>Vestuário<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Calça Jeans</li>
              <li>Blusa Feminina</li>
              <li>Meias</li>
              <li>Camisa Masculina</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Acessórios<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Relógio</li>
              <li>Bolsas</li>
              <li>RelógioS</li>
              <li>Bonés</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Eletrodomésticos<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Geladeira</li>
              <li>Máquina de Lavar</li>
              <li>Fogão</li>
              <li>Televisão</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Perfumária<i class="fas fa-angle-right"></i>
            <ul>
              <li>Colônias</li>
              <li>Esmalte</li>
              <li>Creme Hidrante para mãos</li>
              <li>Creme Hidratante Corporal</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Livros<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Fraldas Descartáveis</li>
              <li>Lenços Umidecidos</li>
              <li>Cadeiras para Passeio</li>
              <li>Bonecas</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Eletroportáteis<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Liquidificador</li>
              <li>Batedeira</li>
              <li>Ferro de Passar</li>
              <li>Fritadeira</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>TVs e Aúdio<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Smart TV</li>
              <li>Jogos</li>
              <li>TV 4K</li>
              <li>Monimtores</li>
          </ul>
          </li>       
          <a href="indexCarrinho.php"><li> Esport e Lazer<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Bicicleta</li>
              <li>Cadeira de Praia</li>
              <li>Esteira Eletrônica</li>
              <li>Bicicleta Ergométrica</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Calçados<i class="fas fa-angle-right"></i><a></a>
            <ul>
              <li>Sapato Masculino</li>
              <li>Tenis</li>
              <li>Sandália</li>
              <li>Sapato Femnino</li>
          </ul>
          </li>
          <a href="indexCarrinho.php"><li>Produtos de Limpeza<i class="fas fa-angle-right"></i></a>
            <ul>
              <li>Sabão em Pó</li>
              <li>Detergente</li>
              <li>Desinfetante</li>
              <li>Quiboa</li>
          </ul>
          </li>
      </ul>
  </div>

  <!---------sliders inicio página--------->

<div class="slider">
    <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imagem/img-1.jpg"  class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="imagem/img-2.jpg"  class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="imagem/img-3.jpg"  class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="imagem/img-4.jpg"  class="d-block w-100">
          </div>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
            <li data-target="#slider" data-slide-to="3"></li>
          </ol>
      </div>
</div>
</section>

<!------------Destaque-categoria--------->

<section class="destaque-categorias"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="imagem/categoria1.jpg">
            </div>
            <div class="col-md-4">
                <img src="imagem/categoria2.jpg">
            </div>
            <div class="col-md-4">
                <img src="imagem/categoria3.jpg">
            </div>   
        </div>
    </div>
</section>

<!------------Compras produtos----------->

<section  class="compra">
  <div class="container">
   <div class="title-box">
    <h2>Compra</h2>
  </div>
  <div class="row">
    <div class="col-md-3">
      <form method="POST"  action="carrrinho.php">
      <div class="produto-home">
       <a href="produto.php"><img src="imagem/produto1.jpg"></a>
        <div class="overlay-rigth">
          <button type="button" class="btn btn-secondary" title="Compra Rápida">
            <a href="MeuCarrinho.php"><i class="fas fa-eye"></i></a>
          </button>
        <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
            <a href=""><i class="fas fa-shopping-cart"></i></a>
        </button>
        </div>
      </div>
      <div class="produto-bottom text-center">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fa fa-star-half-o"></i>
        <h3>Tenis Adidas Feminino</h3>
        <h5>R$145,00</h5>
      </div>
    </div>
      <div class="col-md-3">
        <div class="produto-home">
          <a href="produto.php"><img src="imagem/produto2.jpg"></a>
          <div class="overlay-rigth">
            <button type="button" class="btn btn-secondary" title="Compra Rápida">
            <a href="MeuCarrinho.php"><i class="fas fa-eye"></i></a>
            </button>
          <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
          <a href=""><i class="fas fa-shopping-cart"></i></a>
          </button>
          </div>
        </div>
        <div class="produto-bottom text-center">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fa fa-star"></i>
          <h3>Notebook Apple</h3>
          <h5>R$5.545,00</h5>
        </div>
      </div>
      <div class="col-md-3">
        <div class="produto-home">
            <a href="produto.php"><img src="imagem/produto3.jpg"></a>
          <div class="overlay-rigth">
            <button type="button" class="btn btn-secondary" title="Compra Rápida">
            <a href=""><i class="fas fa-eye"></i></a>
            </button>
          <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
          <a href=""><i class="fas fa-shopping-cart"></i></a>
          </button>
          </div>
        </div>
        <div class="produto-bottom text-center">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-ralf-o"></i>
          <h3>Relógio de Pulso</h3>
          <h5>R$460,00</h5>
        </div>  
  </div>
  <div class="col-md-3">
    <div class="produto-home">
        <a href="produto.php"><img src="imagem/produto4.jpg"></a>
      <div class="overlay-rigth">
        <button type="button" class="btn btn-secondary" title="Compra Rápida">
        <a href=""><i class="fas fa-eye"></i></a>
        </button>
      <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
      <a href=""><i class="fas fa-shopping-cart"></i></a>
      </button>
      </div>
    </div>
    <div class="produto-bottom text-center">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fa fa-star-half-o"></i>
      <h3>Conjunto de panelas Tramontina</h3>
      <h5>R$120,00</h5>
    </div>
</div>
</form>
</section>
<!----------Promoção--------->

<section class="Promocao">
  <div class="container">
    <div class="title-box">
     <h2>Pomoção</h2>
   </div>
   <div class="row">
     <div class="col-md-3">
       <div class="produto-home">
         <img src="imagem/promocao1.jpg">
         <div class="overlay-rigth">
           <button type="button" class="btn btn-secondary" title="Compra Rápida">
             <i class="fas fa-eye"></i>
           </button>
         <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
           <a href=""> <i class="fas fa-shopping-cart"></i></a>
         </button>
         </div>
       </div>
       <div class="produto-bottom text-center">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fa fa-star-half-o"></i>
         <h3>Smartphone Motorola</h3>
         <h5>R$999,99</h5>
       </div>
     </div>
       <div class="col-md-3">
         <div class="produto-home">
           <img src="imagem/promocao2.jpg">
           <div class="overlay-rigth">
             <button type="button" class="btn btn-secondary" title="Compra Rápida">
             <i class="fas fa-eye"></i>
             </button>
           <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
           <a href=""> <i class="fas fa-shopping-cart"></i></a>
           </button>
           </div>
         </div>
         <div class="produto-bottom text-center">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fa fa-star"></i>
           <h3>Faqueiro Tramontina</h3>
           <h5>R$33,99</h5>
         </div>
       </div>
       <div class="col-md-3">
         <div class="produto-home">
           <img src="imagem/promocao3.jpg">
           <div class="overlay-rigth">
             <button type="button" class="btn btn-secondary" title="Compra Rápida">
               <i class="fas fa-eye"></i>
             </button>
           <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
           <a href=""> <i class="fas fa-shopping-cart"></i></a>
           </button>
           </div>
         </div>
         <div class="produto-bottom text-center">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-ralf-o"></i>
           <h3>Colcha Casal</h3>
           <h5>R$279,90</h5>
         </div>  
   </div>
   <div class="col-md-3">
     <div class="produto-home">
       <img src="imagem/promocao4.jpg">
       <div class="overlay-rigth">
         <button type="button" class="btn btn-secondary" title="Compra Rápida">
           <i class="fas fa-eye"></i>
         </button>
       <button type="button" class="btn btn-secondary" title="Adicionar ao Carrinho">
       <a href=""><i class="fas fa-shopping-cart"></i></a>
       </button>
       </div>
     </div>
     <div class="produto-bottom text-center">
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fa fa-star-half-o"></i>
       <h3>Toalha de Banho Santista</h3>
       <h5>R$11,99</h5>
     </div>
 </div>
</section>

<!---------Recursos do site------------->

<section class="website-features">
  <div class="container"> 
    <div class="row">
      <div class="col-md-3 feature-box">
        <img src="imagem/feature-1.png">
        <div class="feature-text">
          <p><b>Itens 100% original</b>, estão disponíveis na loja.</p>
        </div>
      </div>
      <div class="col-md-3 feature-box">
        <img src="imagem/feature-2.png">
        <div class="feature-text">
          <p> Entregamos seu pedido em casa, <b> prazo de entrega até 15 dias.</b></p>
        </div>
      </div>
      <div class="col-md-3 feature-box">
        <img src="imagem/feature-3.png">
        <div class="feature-text">
          <p><b>Pague online através de várias opções de </b> pagamento (Cartão de crédito/Débito e Boleto bancário).</b> </p>
        </div>
      </div>
      <div class="col-md-3 feature-box">
        <img src="imagem/feature-4.png">
        <div class="feature-text">
          <p>Troca ou devolucação <b> prazo de 7 dias.<b></b></p>
        </div>
    </div>
  </div>
</section>

<!---------Footer------->

<section class="footer">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-3">
        <h1>Links Utéis</h1>
        <p>Termos de Uso</p>
        <p>Políticas de privacidade</p>
        <p>Políticas de devolução</p>
        <p>Desconto e Promoções</p>
      </div>
        <div class="col-md-3">
          <h1>Empresa</h1>
          <p>Sobre Nós</p>
          <p>Contate-nos</p>
          <p>Carreira</p>
          <p>Afiliada</p>
        </div>
        <div class="col-md-3">
          <h1>Siga-nos</h1>
          <p><i  class="fa fa-facebook-official"></i><a href="https://m.facebook.com/login/?locale=pt_BR/">Facebook</p></a>
          <p><i class="fa fa-youtube-play"></i><a href="https://www.youtube.com/"> Youtube</p></a>
          <p><i class="fa fa-linkedin"></i><a href="https://br.linkedin.com/"> Linkedin</p></a>
          <p><i class="fa fa-twitter"></i><a href="https://twitter.com/login?lang=pt">Twitter</p></a>
        </div>
       <div class="col-md-3 footer-imagem">
         <h1>Download App</h1>
         <a href="https://www.apple.com/br/"><img src="imagem/app.Apple.png"></a>
         <a href="https://play.google.com/store?hl=pt_BR&gl=US"><img src="imagem/appGooglePlay.png"></a>
    </div>
  </div>
  <hr>
  <p class="copyrigth"> Compra Certa <i class="fa fa-heart-o"></i> Sua compra de forma
  rápida e segura.</p>
</section>
<script>
    function openmenu(){
        document.getElementById("side-menu").style.display="block"
        document.getElementById("menu-btn").style.display="none"
        document.getElementById("close-btn").style.display="block"
    }
    function closemenu(){
        document.getElementById("side-menu").style.display="none"
        document.getElementById("menu-btn").style.display="block"
        document.getElementById("close-btn").style.display="none"
    }
</script>

<section>
  
</section>

</body>
</html>