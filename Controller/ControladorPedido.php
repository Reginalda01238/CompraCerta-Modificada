<?php 
    require "../Model/Pedido.php";

    class ControladorPedido {
        private $pedido;

        function __construct()
		{
			$this->pedido = new Pedido();
        }

        public function consultarHistorico() {
            return $this->pedido->consultarHistorico();
        }
    }
?>