<?php
    require ("PedidoDAO.php");
    class Pedido {
        public static function novoPedido() {
            PedidoDAO::novoPedido();
        }

        public function consultarHistorico() {
            $pedidoDAO = new PedidoDAO();
            return $pedidoDAO->consultarHistorico();
        }
    }
?>