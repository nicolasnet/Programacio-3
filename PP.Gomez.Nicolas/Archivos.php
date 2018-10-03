<?PHP
class Archivos{
    
    public $ruta;
    public $imagen;//aca pasamos los datos de la imagen, osea el index con el nombre de la KEY de la imagen. Ej: $_FILES["fotoDos"] este "fotoDos" es la Key por la q se pasa la imagen
    

    function __construct($ruta="", $imagen=NULL){
        $this->ruta = $ruta;
        $this->imagen = $imagen;
    }



    function guardar($datos){
        $archivo = fopen($this->ruta, "a+");
              
        fwrite ($archivo, $datos.PHP_EOL);
        
        fclose($archivo);
    }


    function abrir(){
        if(file_exists($this->ruta)){ 

            $archivo = fopen($this->ruta, "r+");
            $string = "";

            while(!feof($archivo)){
                $array[] = trim(fgets($archivo));
            }
            
            fclose($archivo);
        }
        else{
            $array=array();
        }
        
        return $array;
    }


    
    function existeJson($arrayJson, $json, $parametro){
        
        $boolExiste = false;
        
        foreach ($arrayJson as $key => $value) {
            if($value->$parametro == $json->$parametro){
                $boolExiste = true;
                break;
            }
        }
        return $boolExiste;
    }



    function existeJsonNombresIguales($arrayJson, $json, $parametro){
        
        $Existe = 0;
        
        foreach ($arrayJson as $key => $value) {
            if(strtolower($value->$parametro) == strtolower($json->$parametro)){
                $Existe++;
                
            }
        }
        return $Existe;
    }


    function existeProv($arrayJson, $parametro, $valor){
        
        $Existe = false;
        
        foreach ($arrayJson as $key => $value) {
            if($value->$parametro == $valor){
                $Existe = true;
                break;
            }
        }
        return $Existe;
    }




    function arrayToJason($array){
        $jsonArray=array();
        foreach ($array as $key => $value) {
            if($value != NULL){
                $jsonArray[] = json_decode($value);
            }
        }

        return $jsonArray;

    }



    function validarTamanio($tamanioMax){
        $tamanioArchivo = $this->imagen["size"];        
        //var_dump($tamanioArchivo);

        if($tamanioArchivo <= $tamanioMax){
            $boolTamanio = true;
        }else{
            $boolTamanio = false;
            echo "supera el tamaño permitido, el cual son ".$tamanioMax." Byte\n";
        }
        return $boolTamanio;
    }

    function validarTipo($tipoAdmitido){
        $tipoArchivo = explode("/", $this->imagen["type"]);
        //var_dump($tipoArchivo);

        if($tipoArchivo[0] == $tipoAdmitido){
            $boolTipo = true;
        }else{
            $boolTipo = false;
            echo "No coincide con el tipo de archivo admitido: ".$tipoAdmitido."\n";
        }
        return $boolTipo;
    }
    
}

?>