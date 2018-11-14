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
            $sql =$pdo->RetornarConsulta("INSERT into compras (marca,modelo,fecha,precio)values(:marca,:modelo,:fecha,:precio)");

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


}



?>