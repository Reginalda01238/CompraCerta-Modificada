<?php
    require ("conexao.php");

    class UsuarioDAO {
        public function cadastrar($nome, $email, $senha, $endereco, $telefone, $numcard, $valcard, $cvv) {
            $cadastrarUsuario = "INSERT into usuarios (nome, telefone, email, senha, endereco, numcard, valcard, cvv) values ";
            $cadastrarUsuario .= "('$nome', '$telefone', '$email', '$senha', '$endereco', '$numcard', '$valcard', '$cvv')";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $cadastrarUsuario);

            if ( !$fazerQuery )
                die("Erro na inserção!");
            else
                header('Location: ../View/login.php');
        }

        public function login($email, $senha) {
            $logarUsuario = "SELECT * FROM usuarios ";
            $logarUsuario .= "WHERE email = '$email' AND senha = '$senha' ";

            $fazerQuery = mysqli_query(Conexao::getConexao(), $logarUsuario);

            if (mysqli_num_rows($fazerQuery) > 0 ) {
                $resultado = mysqli_fetch_assoc($fazerQuery);
                //print_r($resultado);
                $_SESSION["idusuario"] = $resultado["id_usuario"];
                $_SESSION["nome"] = $resultado["nome"];
                //print_r($_SESSION);
                echo "Login bem sucedido";
                header("location: ../View/index.php");
            }
            else 
                die("Credenciais incorretas");
        }
    }
?>