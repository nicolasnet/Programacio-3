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
        if(!$archivo->existeJson($archivo->arrayToJason($archivo->abrir()),json_decode($proveedor->__tojson()), "id")){//si el id existe, no lo agrega al TXT.
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
        $ocurrencias = $archivo->existeJsonNombresIguales($archivo->arrayToJason($archivo->abrir()),json_decode($proveedor->__tojson()), "nombre");
        
        if($ocurrencias==0){
                return "No existe proveedor: ".$proveedor->nombre;
        }else{
            return $ocurrencias;
        }
    }


    function proveedores($archivo){
        $array = $archivo->abrir();

        foreach ($array as $key) {
            echo $key;
            echo "\n";
        }

    }

}
?>