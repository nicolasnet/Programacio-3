<?PHP
require_once "./Archivos.php";

class Materia{
    public $codigoM;
    public $nombreM;
    public $cupo;
    public $aula;
       


    function __construct($codigoM='',$nombreM= '',$cupo='', $aula=''){
        $this->codigoM = $codigoM;
        $this->nombreM = $nombreM;
        $this->cupo = $cupo;
        $this->aula = $aula;        
    }


    function __tostring(){
        return $this->nombreM."_".$this->cupo."_".$this->aula;
    }


    function __tojson(){ //paso un objeto materia a un string con el formato de json
        return $lista = json_encode($this);
    }



    function cargarMateria($archivoMaterias){
        if(!$archivoMaterias->existeJson(json_decode($this->__tojson()),   "codigoM")){
            $archivoMaterias->guardar(json_encode($this));
            return "nueva materia guardada";
        }
        else{
            return "codigo de la materia ya existe";
        }
    }
    
}
?>