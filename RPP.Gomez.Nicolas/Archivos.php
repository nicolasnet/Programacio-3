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
            //$string = "";

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


    function modificar($newObjetoJson, $parametroCompara){
        $arrayObjetoJson = $this->arrayToJason($this->abrir());

        foreach ($arrayObjetoJson as $key => $value) {
            if($value->$parametroCompara == $newObjetoJson->$parametroCompara){
                $arrayObjetoJson[$key] = $newObjetoJson;
                break;
            }        
        }
        $archivo = fopen($this->ruta, "w");

        foreach ($arrayObjetoJson as $key => $value) {
            $datos = json_encode($value);

            fwrite ($archivo, $datos.PHP_EOL);
        }

        fclose($archivo);
    }




    
    function existeJson($objetoJson, $parametro){
        $arrayObjetoJson = $this->arrayToJason($this->abrir());

        $boolExiste = false;
        
        foreach ($arrayObjetoJson as $key => $value) {
            if($value->$parametro == $objetoJson->$parametro){
                $boolExiste = true;
                break;
            }
        }
        return $boolExiste;
    }


    function getJson($objetoJson, $parametro){
        $arrayObjetoJson = $this->arrayToJason($this->abrir());
        foreach ($arrayObjetoJson as $key => $value) {
            if($value->$parametro == $objetoJson->$parametro){
                $JsonReturn = $value;
                break;
            }
        }
        return $JsonReturn;
    }



    function getJsonByvalue($valor, $parametro){
        $arrayObjetoJson = $this->arrayToJason($this->abrir());
        
        foreach ($arrayObjetoJson as $key => $value) {
            if($value->$parametro == $valor){
                $JsonReturn = $value;
                break;
            }
        }
        return $JsonReturn;
    }





    function existeJsonNombresIguales($arrayObjetoJson, $objetoJson, $parametro){
        
        $Existe = 0;
        
        foreach ($arrayObjetoJson as $key => $value) {
            if(strtolower($value->$parametro) == strtolower($objetoJson->$parametro)){
                $Existe++;
                
            }
        }
        return $Existe;
    }


    function existeProv($arrayObjetoJson, $parametro, $valor){
        
        $Existe = false;
        
        foreach ($arrayObjetoJson as $key => $value) {
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