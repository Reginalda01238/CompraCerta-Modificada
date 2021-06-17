<?php
    require ("conexao.php");

    class ProdutoDAO {
        public function consultar() {
            $consultarProduto = "SELECT * FROM produtos ";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $consultarProduto);

            if (!$fazerQuery)
                die("Erro na consulta!");
            else {
                //$resultado = mysqli_fetch_array($fazerQuery);
                return $fazerQuery;
            }
        }
    }
?>