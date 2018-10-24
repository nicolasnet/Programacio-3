<?PHP
require_once "./Archivos.php";

class Inscripcion{
    public $codigoM;
    public $nombreM;
    
    public $nombre;
    public $apellido;
    public $email;
       


    function __construct($codigoM='',$nombreM='', $nombre='', $apellido='', $email=''){
        $this->codigoM = $codigoM;
        $this->nombreM = $nombreM;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }


    function __tostring(){
        return $this->email."_".$this->nombre."_".$this->apellido."_".$this->codigoM."_".$this->nombreM;
    }


    function __tojson(){ //paso un objeto inscripcion a un string con el formato de json
        return $lista = json_encode($this);
    }


    function inscribirAlumno($archivoAlumno, $archivoMaterias, $archivoInscripciones){
        $infoReturn ="";
        $materia = $archivoMaterias->getJsonByvalue($this->codigoM, "codigoM");
        if($materia->cupo >0){
            if($archivoAlumno->existeProv($archivoAlumno->arrayToJason($archivoAlumno->abrir()), "email" ,$this->email)){
                if($archivoMaterias->existeProv($archivoMaterias->arrayToJason($archivoMaterias->abrir()), "codigoM" ,$this->codigoM)){

                    $archivoInscripciones->guardar(json_encode($this));
                    $newObjetoJson = $materia;
                    $newObjetoJson->cupo = $newObjetoJson->cupo- 1;
                    $archivoMaterias->modificar($newObjetoJson, "codigoM");

                    $infoReturn = "nueva Inscripcion guardada";
                }
                else{
                    $infoReturn = "Se encontro al alumno pero No coincide el Codigo de materia ";
                }
            }
            else{
                $infoReturn = "el email del alumno no coincide con la base de datos";
            }
         
        }else{
            $infoReturn = "no hay cupo";
        }

        return $infoReturn; 
    }

    function inscripciones($archivo, $parametro='', $valorParametro=''){
        $array = $archivo->abrir();
        /*
        echo "email alumno: ";
        echo "\t |";
        echo "Nombre: ";
        echo "\t |";
        echo "Apellido: ";
        echo "\t |";
        echo "Nombre Mat: ";
        echo "\t |";
        echo "Cod Mat: ";
        echo "\n";
        */
        if($parametro == '' && $valorParametro == ''){
            foreach ($array as $key) {
                if($key != NULL){
                    $objetoJson = json_decode($key);
                    
                    echo $objetoJson->email;
                    echo "\t |";
                    
                    echo $objetoJson->nombre;
                    echo "\t |";
                    
                    echo $objetoJson->apellido;
                    echo "\t |";
                    
                    echo $objetoJson->nombreM;
                    echo "\t |";
                    
                    echo $objetoJson->codigoM;
                    echo "\n";
                }
            }
        }else{
            foreach ($array as $key) {
                if($key != NULL){
                    $objetoJson = json_decode($key);
                    if($objetoJson->$parametro == $valorParametro){
                        echo $objetoJson->email;
                        echo "\t |";
                        
                        echo $objetoJson->nombre;
                        echo "\t |";
                        
                        echo $objetoJson->apellido;
                        echo "\t |";
                        
                        echo $objetoJson->nombreM;
                        echo "\t |";
                        
                        echo $objetoJson->codigoM;
                        echo "\n";
                    }
                }
            }
            
        }
    }

}
?>