<?php
    require ("conexao.php");
    require ("Pedido.php");
    class CarrinhoDAO {
        public function colocarNoCarrinho($produtoDoCarrinho) {
            $id_usuario = $_SESSION["idusuario"];

            $pedido  = "SELECT id_pedido, estado FROM pedidos ";
            $pedido .= "WHERE fk_usuarios = '$id_usuario' AND estado = 'No carrinho' ";
            $pedido .= "ORDER BY id_pedido DESC ";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $pedido);

            if (mysqli_num_rows($fazerQuery) == 0) {
                //echo "a";
                Pedido::novoPedido();
                $pedido  = "SELECT id_pedido, estado FROM pedidos ";
                $pedido .= "WHERE fk_usuario = '$id_usuario' AND estado = 'No carrinho' ";
                $pedido .= "ORDER BY id_pedido DESC ";

                $fazerQuery = mysqli_query(Conexao::getConexao(), $pedido);
            }

            $resultado = mysqli_fetch_assoc($fazerQuery);
            print_r($resultado);
            //print_r($produtoDoCarrinho);
            //echo $resultado["id_pedido"];


            $_SESSION["id_pedido"] = $resultado["id_pedido"];
            
            if ($resultado["estado"] == "No carrinho" ) {
                $id_pedido = $_SESSION["id_pedido"];
                $id_produto = $produtoDoCarrinho[0]["id_produto"];
                $valorproduto = $produtoDoCarrinho[0]["valor"];

                //echo $id_pedido . $id_produto;

                $inserir  = "INSERT INTO carrinho ";
                $inserir .= "(fk_pedidos, fk_produtos) ";
                $inserir .= "VALUES ('$id_pedido', '$id_produto') ";

                $fazerQuery = mysqli_query(Conexao::getConexao(), $inserir);

                if (!$fazerQuery) 
                    die ("Erro na inserção de pedido!");
                else {
                    $recuperar  = "SELECT id_pedido, valortotal, fk_usuarios FROM pedidos where ";
                    $recuperar .= "fk_usuarios = '$id_usuario' AND estado = 'No carrinho' ";
                    $recuperar .= "ORDER BY id_pedido DESC ";

                    $fazerQuery = mysqli_query(Conexao::getConexao(), $recuperar);

                    $resultado = mysqli_fetch_assoc($fazerQuery);
                    print_r($resultado);

                    $valorbanco = $resultado["valortotal"];
                    $valorbanco += $valorproduto;
                    
                    $id_pedido = $resultado["id_pedido"];

                    $atualizarvalor  = "UPDATE pedidos SET valortotal = '$valorbanco' ";
                    $atualizarvalor .= "WHERE id_pedido = '$id_pedido' ";

                    $fazerQuery = mysqli_query(Conexao::getConexao(), $atualizarvalor);

                    if (!$fazerQuery)
                        die ("Erro na atualização de valor do pedido!");
                    else
                        //echo "a";
                        header("location: carrinho.php");
                }
            }
        }
        

        public function montarPedido() {
            $id_usuario = $_SESSION["idusuario"];
            $id_pedido = $_SESSION["id_pedido"];

            $carrinho  = "SELECT PR.nome, PE.valortotal, PR.id_produto, PR.valor ";
			$carrinho .= "FROM produtos PR ";
			$carrinho .= "INNER JOIN carrinho C ON PR.id_produto = C.fk_produtos ";
			$carrinho .= "INNER JOIN pedidos PE ON C.fk_pedidos = PE.id_pedido ";
			$carrinho .= "WHERE PE.fk_usuarios = '$id_usuario' AND PE.id_pedido = '$id_pedido' ";
            $carrinho .= "AND PE.estado = 'No carrinho' ";
            
            $fazerQuery = mysqli_query(Conexao::getConexao(), $carrinho);

            if ( !$fazerQuery )
                die("Erro na montagem de carrinho!");
            else if (mysqli_num_rows($fazerQuery) == 0) { ?>
                <p>Carrinho vazio</p>
            <?php } else {
                while ($dados = mysqli_fetch_object($fazerQuery)) {
                    $arraycarrinho[] = array("nome" => $dados->nome,
                                             "valortotal" => $dados->valortotal,
                                             "id_produto" => $dados->id_produto,
                                             "valor_produto" => $dados->valor);
                }
                return $arraycarrinho;
            }
        }

        public function finalizarCompra() {
            $id = $_SESSION["id_pedido"];
            $finalizarcompra  = "UPDATE pedidos ";
            $finalizarcompra .= "SET estado = 'Confirmado' ";
            $finalizarcompra .= "WHERE id_pedido = '$id' ";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $finalizarcompra);

            if ( !$fazerQuery )
                die("Erro na montagem de carrinho!");
            else {
                echo "Pedido confirmado. Obrigado por sua compra " . $_SESSION["nome"];
            }
        }
    }
?>