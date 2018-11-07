<?php
use \Firebase\JWT\JWT;
require_once "./AccesoDatos.php";

class login{

    public $user;
    public $pass;
    

/*
    function __construct($user='', $pass=''){
        $this->user = $user;
        $this->pass = $pass;
    }
*/

    function __tojson(){ //paso un objeto cd a un string con el formato de json
        return json_encode($this);
    }

    public static function consultaLogin($arrayDeParametros){
        
        $pdo = AccesoDatos::dameUnObjetoAcceso();//al ser una funcion statica, no se instancia el objeto y se llama directamente con el nombre de la clase y ::
        //$sql = $pdo->RetornarConsulta('SELECT id, titel as titulo,interpret as cantante, jahr as año  FROM cds ');//uso la funcion de la clase desde el objeto de coneccio que me devolvio la clase
        //var_dump($arrayDeParametros["user"]);
        
        $sql = $pdo->RetornarConsulta("SELECT * FROM login WHERE user=:user AND pass=:pass");
        $sql->bindValue(':user',$arrayDeParametros['user'], PDO::PARAM_STR);
        $sql->bindValue(':pass',$arrayDeParametros['pass'], PDO::PARAM_STR);
        //$sql = $pdo->RetornarConsulta("SELECT * FROM login");
        $sql->execute(); //este execute se usa ya que la clase AccesoDatos usa el prepare!!!!

        //$catidadFilas = $sql->rowCount();
        //echo "cantidad de filas: ".$catidadFilas."<br>";

        $resultado = $sql->fetchAll(PDO::FETCH_CLASS, 'login');
        //var_dump($resultado);

        return $resultado;

    }


}



?>