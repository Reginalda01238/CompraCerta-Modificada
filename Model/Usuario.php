<?php
    require ("UsuarioDAO.php");

    class Usuario {
        private $nome;
        private $email;
        private $senha;
        private $endereco;
        private $telefone;
        private $numcard;
        private $cvv;
        private $valcard;

        public function cadastrar ($nome, $email, $senha, $endereco, $telefone, $numcard, $valcard, $cvv) {
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->cadastrar($nome, $email, $senha, $endereco, $telefone, $numcard, $valcard, $cvv);
        }

        public function login ($email, $senha) {
            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->login($email, $senha);
        }
    }
?>