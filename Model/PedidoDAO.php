<?php
    require_once ("conexao.php");
    class PedidoDAO {
        public static function novoPedido () {
            $id_usuario = $_SESSION["idusuario"];

            $novopedido  = "INSERT INTO pedidos (valortotal, estado, fk_usuarios) ";
            $novopedido .= "VALUES (0.00, 'No carrinho', '$id_usuario') ";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $novopedido);

            if (!$novopedido) 
                die("Erro na criação de pedido");
        }

        public function consultarHistorico() {
            $id_usuario = $_SESSION["idusuario"];

            $consultarHistorico  = "SELECT PE.id_pedido, PE.valortotal, PE.estado, PR.nome ";
			$consultarHistorico .= "FROM usuarios U ";
			$consultarHistorico .= "INNER JOIN pedidos PE ON U.id_usuario = PE.fk_usuarios ";
			$consultarHistorico .= "INNER JOIN carrinho C ON PE.id_pedido = C.fk_pedidos ";
            $consultarHistorico .= "INNER JOIN produtos PR ON C.fk_produtos = PR.id_produto ";
            $consultarHistorico .= "WHERE U.id_usuario = '$id_usuario' ";
            $consultarHistorico .= "GROUP BY PE.id_pedido ";
            $consultarHistorico .= "ORDER BY PE.id_pedido ";
            
            
            $fazerQuery = mysqli_query(Conexao::getConexao(), $consultarHistorico);

            if (!$fazerQuery)
                die("Erro ao buscar lista de pedidos!");
            else
                return $fazerQuery;
        }
    }
?>