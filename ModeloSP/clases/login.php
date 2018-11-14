<?php
use \Firebase\JWT\JWT;
require_once "./clases/AccesoDatos.php";

class login{

    public $email;
    public $clave;
    public $perfil;

    public static function consultaLogin($arrayDeParametros){
        
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        
        $sql = $pdo->RetornarConsulta("SELECT * FROM usuarios WHERE email=:email AND clave=:clave");
        $sql->bindValue(':email',$arrayDeParametros['email'], PDO::PARAM_STR);
        $sql->bindValue(':clave', $arrayDeParametros['clave'], PDO::PARAM_STR);
        
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_CLASS, 'login');
        
        return $resultado;

    }

    public static function creaLogin($arrayDeParametros){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        try{
            $sql =$pdo->RetornarConsulta("INSERT into usuarios (email,clave,perfil)values(:email,:clave,:perfil)");

            $sql->bindValue(':email',$arrayDeParametros['email'], PDO::PARAM_STR);
            $sql->bindValue(':clave', $arrayDeParametros['clave'], PDO::PARAM_STR);
            $sql->bindValue(':perfil', $arrayDeParametros['perfil'], PDO::PARAM_STR);
            $sql->execute();            
            return $sql->rowCount();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }



    public static function TraerTodos(){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("select * from usuarios");
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "login");       

        return $resultado;

    }


}



?>