<?php
    require ("ProdutoDAO.php");

    class Produto {


        public function consultar () {
            $produtoDAO = new ProdutoDAO();
            return $produtoDAO->consultar();
        }
    }

?>