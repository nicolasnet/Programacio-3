<?php
use \Firebase\JWT\JWT;
require_once "./clases/AccesoDatos.php";

class compra{

    public $marca;
    public $modelo;
    public $fecha;
    public $precio;
    

    public static function crearCompra($arrayDeParametros){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        try{
            $sql =$pdo->RetornarConsulta("INSERT into compras (usuario, marca,modelo,fecha,precio)values(:usuario,:marca,:modelo,:fecha,:precio)");

            $sql->bindValue(':usuario',$arrayDeParametros['usuario'], PDO::PARAM_STR);
            $sql->bindValue(':marca',$arrayDeParametros['marca'], PDO::PARAM_STR);
            $sql->bindValue(':modelo', $arrayDeParametros['modelo'], PDO::PARAM_STR);
            $sql->bindValue(':fecha', $arrayDeParametros['fecha'], PDO::PARAM_STR);
            $sql->bindValue(':precio', $arrayDeParametros['precio'], PDO::PARAM_INT);
            $sql->execute();            
            return $sql->rowCount();
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


    public static function TraerUnoPorUsuario($email){
        //var_dump($email);

        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("SELECT * FROM compras WHERE user=:email");
        $sql->bindValue(':email',$email, PDO::PARAM_STR);
        $sql->execute();

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "compra");
        
        return $resultado;

    }

}



?>