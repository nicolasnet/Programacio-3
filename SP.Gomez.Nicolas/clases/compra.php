<?php
use \Firebase\JWT\JWT;
require_once "./clases/AccesoDatos.php";

class compra{

    public $marca;
    public $modelo;
    public $fecha;
    public $kilometros;
    

    public static function crearCompra($arrayDeParametros, $email){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        try{
            $sql =$pdo->RetornarConsulta("INSERT into compras (user, marca,modelo,kilometros)values(:usuario,:marca,:modelo,:kilometros)");

            $sql->bindValue(':usuario', $email, PDO::PARAM_STR);
            $sql->bindValue(':marca',$arrayDeParametros['marca'], PDO::PARAM_STR);
            $sql->bindValue(':modelo', $arrayDeParametros['modelo'], PDO::PARAM_STR);
            //$sql->bindValue(':fecha', $arrayDeParametros['fecha'], PDO::PARAM_STR);
            $sql->bindValue(':kilometros', $arrayDeParametros['kilometros'], PDO::PARAM_INT);
            $sql->execute();
            return $pdo->RetornarUltimoIdInsertado();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


    public static function TraerTodos(){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("select * from compras");
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "compra");   

        return $resultado;

    }


    public static function TraerUnoPorUsuario($usuario){
        //var_dump($email);

        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("SELECT * FROM compras WHERE user=:usuario");
        $sql->bindValue(':usuario',$usuario, PDO::PARAM_STR);
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "compra");
        
        return $resultado;

    }


    public static function TraerTodosPorMarca($marca){

        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("SELECT * FROM compras WHERE marca=:marca");
        $sql->bindValue(':marca',$marca, PDO::PARAM_STR);
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "compra");
        
        return $resultado;

    }



    public static function TraerTodosProductos(){

        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("select distinct `modelo`, `marca` FROM `compras`");
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "compra");
        
        return $resultado;

    }

}



?>