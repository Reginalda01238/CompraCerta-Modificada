<?php
    require ("CarrinhoDAO.php");
    class Carrinho {
        public function colocarNoCarrinho($produtoDoCarrinho) {
            $carrinhoDAO = new CarrinhoDAO();
            //print_r($produtoDoCarrinho);
            $carrinhoDAO->colocarNoCarrinho($produtoDoCarrinho);
        }

        public function montarCarrinho() {
            $carrinhoDAO = new CarrinhoDAO();
            return $carrinhoDAO->montarPedido();
        }

        public function finalizarCompra() {
            $carrinhoDAO = new CarrinhoDAO();
            $carrinhoDAO->finalizarCompra();
        }
    }
?>