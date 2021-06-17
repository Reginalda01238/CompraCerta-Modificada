<?php 
    require "../Model/Produto.php";
    
    class ControladorProduto {
        private $produto;

        function __construct()
		{
			$this->produto = new Produto();
        }

        public function consultar () {
            return $this->produto->consultar();
        }
    }
?>