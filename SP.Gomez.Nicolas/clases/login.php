<?php
use \Firebase\JWT\JWT;
require_once "./clases/AccesoDatos.php";

class login{

    public $usuario;
    public $clave;
    public $tipo;

    public static function consultaLogin($arrayDeParametros){   
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        
        $sql = $pdo->RetornarConsulta("SELECT * FROM usuarios WHERE usuario=:usuario");
        $sql->bindValue(':usuario',$arrayDeParametros['usuario'], PDO::PARAM_STR);
        //$sql->bindValue(':clave', $arrayDeParametros['clave'], PDO::PARAM_STR);
        
        $sql->execute();

        $usuario = $sql->fetchAll(PDO::FETCH_CLASS, 'login');
        if($usuario!=NULL){
            if($usuario[0]->clave == $arrayDeParametros['clave']){
                $resultado = $usuario;
            }
            else{
                $resultado="Clave no valida";
            }
        }
        else{
            $resultado = "Usuario no valido";
        }

        //var_dump($usuario[0]->clave); 

        return $resultado;
    }


    public static function creaUsuario($arrayDeParametros){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        try{
            $sql =$pdo->RetornarConsulta("INSERT into usuarios (usuario,clave,tipo)values(:usuario,:clave,:tipo)");            

            $sql->bindValue(':usuario', ucwords(strtolower($arrayDeParametros['usuario'])), PDO::PARAM_STR);
            $sql->bindValue(':clave', $arrayDeParametros['clave'], PDO::PARAM_STR);
            $sql->bindValue(':tipo', strtolower($arrayDeParametros['tipo']), PDO::PARAM_STR);
            
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