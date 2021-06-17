<?php 
    require "../Model/Carrinho.php";

    class ControladorCarrinho {
        private $carrinho;

        function __construct()
		{
			$this->carrinho = new Carrinho();
        }

        public function montarCarrinho () {
            return $this->carrinho->montarCarrinho();
        }

        public function finalizarCompra() {
            $this->carrinho->finalizarCompra();
        }
    }
?>