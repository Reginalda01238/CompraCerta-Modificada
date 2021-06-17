<?php
    require "../Model/Usuario.php";

    class ControladorUsuario {
        private $usuario;

        function __construct()
		{
			$this->usuario = new Usuario();
        }
        
        public function cadastrar ($nome, $email, $senha, $endereco, $telefone, $numcard, $valcard, $cvv) {
            $this->usuario->cadastrar($nome, $email, $senha, $endereco, $telefone, $numcard, $valcard, $cvv);
        }

        public function login($email, $senha) {
            $this->usuario->login($email, $senha);
        }
    }
?>