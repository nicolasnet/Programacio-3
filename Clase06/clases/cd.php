<?php
require_once "./clases/AccesoDatos.php";

class cd{

    public $id;
    public $titulo;
    public $cantante;
    public $año;

/* saco el constructor para no tener problemas al cargar los datos desde la base de datos
    function __construct($id='', $titulo='', $cantante='', $año=''){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->cantante = $cantante;
        $this->año = $año;
    }
*/

    function __tojson(){ //paso un objeto cd a un string con el formato de json
        return json_encode($this);
    }


    public static function TraerTodos(){
        echo "\nentra a TODOSCDS";
        $pdo = AccesoDatos::dameUnObjetoAcceso();//al ser una funcion statica, no se instancia el objeto y se llama directamente con el nombre de la clase y ::
        //$sql = $pdo->RetornarConsulta('SELECT id, titel as titulo,interpret as cantante, jahr as año  FROM cds ');//uso la funcion de la clase desde el objeto de coneccio que me devolvio la clase
        $sql = $pdo->RetornarConsulta("select id,titel as titulo, interpret as cantante,jahr as año from cds");
        $sql->execute(); //este execute se usa ya que la clase AccesoDatos usa el prepare!!!!

        //$catidadFilas = $sql->rowCount();
        //echo "cantidad de filas: ".$catidadFilas."<br>";

        $resultado = $sql->fetchall(PDO::FETCH_CLASS, "cd");       

        return $resultado;

    }

    public static function TraerUnCd($id){
        echo "\nentra a UNCD";
        $pdo = AccesoDatos::dameUnObjetoAcceso();
        $sql = $pdo->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
        $sql->execute(); 
        $cdBuscado = $sql->fetchObject('cd');
        return $cdBuscado;
    }



    public function InsertarNuevoCdParametros(){
        $pdo = AccesoDatos::dameUnObjetoAcceso(); 
        $sql =$pdo->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");

        $sql->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
        $sql->bindValue(':anio', $this->año, PDO::PARAM_STR);
        $sql->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
        $sql->execute();		
        return $pdo->RetornarUltimoIdInsertado();
    }



    public function BorrarCd(){
        $pdo = AccesoDatos::dameUnObjetoAcceso(); 
        $sql =$pdo->RetornarConsulta("delete from cds WHERE id=:id");

        $sql->bindValue(':id',$this->id, PDO::PARAM_INT);		
        $sql->execute();
        return $sql->rowCount();
	}

    

    public function ModificarCdParametros(){
        $pdo = AccesoDatos::dameUnObjetoAcceso(); 
        $sql =$pdo->RetornarConsulta("update cds set titel=:titulo, interpret=:cantante, jahr=:anio WHERE id=:id");
        
        $sql->bindValue(':id',$this->id, PDO::PARAM_INT);
        $sql->bindValue(':titulo',$this->titulo, PDO::PARAM_STR);
        $sql->bindValue(':anio', $this->año, PDO::PARAM_INT);
        $sql->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
        //var_dump($sql->execute());
        $sql->execute();
        return $sql->rowCount();
	}


}



?>