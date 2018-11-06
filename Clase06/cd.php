<?php
require_once "./AccesoDatos.php";

class cd{

    public $id;
    public $titulo;
    public $cantante;
    public $año;


    function __construct($id='', $titulo='', $cantante='', $año=''){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->cantante = $cantante;
        $this->año = $año;
    }


    function __tojson(){ //paso un objeto cd a un string con el formato de json
        return json_encode($this);
    }


    public static function TraerTodos(){

        $pdo = AccesoDatos::dameUnObjetoAcceso();//al ser una funcion statica, no se instancia el objeto y se llama directamente con el nombre de la clase y ::
        //$sql = $pdo->RetornarConsulta('SELECT id, titel as titulo,interpret as cantante, jahr as año  FROM cds ');//uso la funcion de la clase desde el objeto de coneccio que me devolvio la clase
        $sql = $pdo->RetornarConsulta('SELECT *  FROM cds ');
        $sql->execute(); //este execute se usa ya que la clase AccesoDatos usa el prepare!!!!

        //$catidadFilas = $sql->rowCount();
        //echo "cantidad de filas: ".$catidadFilas."<br>";

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "cd");
        //var_dump($resultado);
                
        $arrayOBJJson = json_encode($resultado);

        return $arrayOBJJson;

    }

/*
    function Guardar(){
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("INSERT into cd (titel, interpret, jahr) values (:titulo,:cantante,:añio)")
        $sql->binddValue(':titulo', $this->titulo, PDO::PARAM_STR);
        $sql->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
        $sql->bindValue(':añio', $this->añio, PDO::PARAM_INT);        
        $sql->execute();
    }
*/

    public static function TraerUnCd($id){

        $pdo = AccesoDatos::dameUnObjetoAcceso();
        //$sql = $pdo->RetornarConsulta('SELECT id, titel as titulo,interpret as cantante, jahr as año  FROM cds where id = $id');
        $sql = $pdo->RetornarConsulta('SELECT *  FROM cds where id = $id');
        $sql->execute(); 
        $cdBuscado = $sql->fetchObject('cd');
        return $cdBuscado;
    }


}



?>