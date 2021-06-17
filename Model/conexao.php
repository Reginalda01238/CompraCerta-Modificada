<?php
class Conexao{
    public static function getConexao(){
        $servername = "localhost"; 
        $username = "root";
        $password = "";
        $dbname = "compracerta";

        $conecta = mysqli_connect($servername,$username,$password,$dbname);

        if ( mysqli_connect_errno() )
            die("Conexão falhou: " . mysqli_connect_errno());
        
        return $conecta;
    }
}
?>