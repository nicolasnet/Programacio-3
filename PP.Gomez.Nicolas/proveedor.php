<?PHP
require_once "./Archivos.php";

class Proveedor{
    public $id;
    public $nombre;
    public $email;
    public $foto;


    function __construct($id='',$nombre='', $email='',$foto=''){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->foto = $foto;
    }


    function __tostring(){
        return $this->id."_".$this->nombre."_".$this->email;
    }


    function __tojson(){ //paso un objeto proveedor a un string con el formato de json
        return $lista = json_encode($this);    
    //$json = json_decode($lista);
    //return $json;   
    }




    function cargarProveedor($archivo, $proveedor){
        if(!$archivo->existeJson(json_decode($proveedor->__tojson()),   "id")){//si el id existe, no lo agrega al TXT.
            $archivo->guardar(json_encode($proveedor));
            
            $array = explode(".", $_FILES["foto"]["name"]);//traigo todo el nombre de la imagen(incluye la extencion)            
            //hay que tener cuidado si el nombre del archivo tiene mas de un punto, en ese caso generaria mas de 2 string en el array        
            $imagen = "./fotos/".$proveedor.".".end($array);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $imagen);

            return "nuevo proveedor guardado";
        }
        else{
            return "ID Repetido";
        }
    }



    function consultarProveedor($archivo, $proveedor){
        $ocurrencias = $archivo->existeJsonNombresIguales($archivo->arrayToJason($archivo->abrir()),  json_decode($proveedor->__tojson()),   "nombre");
        
        if($ocurrencias==0){
            return "No existe proveedor: ".$proveedor->nombre;
        }else{
            return "El proveedor '".$proveedor->nombre."', esta repetido ".$ocurrencias." veces.";
        }
    }

    
    //Con esta funcion imprimo cada dato del JSON
    function proveedores($archivo){
        $array = $archivo->abrir();

        foreach ($array as $key) {
            if($key != NULL){
                $objetoJson = json_decode($key);
                echo $objetoJson->id;
                echo "\t";
                echo $objetoJson->nombre;
                echo "\t";
                echo $objetoJson->email;
                echo "\n";
            }
        }
    }
    

    /*
    //Con esta funcion imprimo el string de Json
    function proveedores($archivo){
        $array = $archivo->abrir();

        foreach ($array as $key) {
            if($key != NULL){
                echo $key;
                echo "\n";
            }    
        }
    }
    */




    function modificarProveedor($archivo, $newProv){
        
        $newJson = json_decode($newProv->__tojson());
        if($archivo->existeJson($newJson, "id")){
            $jsonAnterior = $archivo->getJson($newJson, "id");
            $provAnterior = new Proveedor($jsonAnterior->id, $jsonAnterior->nombre, $jsonAnterior->email, $jsonAnterior->foto);
            
            $array = explode(".", $provAnterior->foto->name);            
            $imagenAnterior = "./fotos/".$provAnterior.".".end($array);
            $enBackup = "./backUpFotos/".$provAnterior->id."_".date("Y"). date("m").date("d").".".end($array);
            rename($imagenAnterior, $enBackup);

            $arrayNuevo = explode(".", $_FILES["foto"]["name"]);
            $imagen = "./fotos/".$newProv.".".end($arrayNuevo);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $imagen);


            $archivo->modificar($newJson, "id");
            
            return "Proveedor encontrado.";
        }else{
            return "El proveedor no existe";
        }
        
    }




    function fotosBack(){
        /*
        $dir = "./fotos/";

        // Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    echo "filename:" . $file . "<br>";
                }
                closedir($dh);
            }
        }
        */

        $directorio = opendir("./backUpFotos/"); //ruta actual
        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if($archivo != "." && $archivo != ".."){//los 1ros dos string son "." y ".." x eso los omito
                $archProv = new Archivos("./proveedores.txt");
                $array = explode("_", $archivo);
                echo $archProv->getJsonByvalue($array[0], "id")->nombre;
                echo "\t".$archivo;
                echo "\n";
                
                /*
                if (is_dir($archivo))//verificamos si es o no un directorio
                {
                    echo "[".$archivo . "]\n"; //de ser un directorio lo envolvemos entre corchetes
                }
                else
                {
                    echo $archivo . "\n";
                }
                */
            }
        }
        closedir($directorio);
    }
}
?>