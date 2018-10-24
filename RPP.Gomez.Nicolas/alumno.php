<?PHP
require_once "./Archivos.php";

class alumno{    
    public $nombre;
    public $apellido;
    public $email;
    public $foto;


    function __construct($email='',$nombre='', $apellido='',$foto=''){        
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;        
        $this->foto = $foto;
    }


    function __tostring(){
        return $this->email."_".$this->nombre."_".$this->apellido;
    }


    function __tojson(){ //paso un objeto alumno a un string con el formato de json
        return $lista = json_encode($this);
    }




    function cargarAlumno($archivo, $alumno){
        if(!$archivo->existeJson(json_decode($alumno->__tojson()),   "email")){//si el email existe, no lo agrega al TXT.
            $archivo->guardar(json_encode($alumno));
            
            $array = explode(".", $_FILES["foto"]["name"]);//traigo todo el nombre de la imagen(incluye la extencion)            
            //hay que tener cuidado si el nombre del archivo tiene mas de un punto, en ese caso generaria mas de 2 string en el array        
            $imagen = "./fotos/".$alumno.".".end($array);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $imagen);

            return "nuevo alumno guardado";
        }
        else{
            return "email Repetido";
        }
    }



    function consultarAlumno($archivo, $alumno){
        $ocurrencias = $archivo->existeJsonNombresIguales($archivo->arrayToJason($archivo->abrir()),  json_decode($alumno->__tojson()),   "apellido");
        
        if($ocurrencias==0){
            return "No existe alumno con apellido: ".$alumno->apellido;
        }else{
            return "El alumno '".$alumno->apellido."', esta repetido ".$ocurrencias." veces.";
        }
    }

    
    //Con esta funcion imprimo cada dato del JSON
    function alumnos($archivo){
        $array = $archivo->abrir();
        echo "email alumno: ";
        echo "\t |";
        echo "Nombre: ";
        echo "\t |";
        echo "Apellido: ";
        echo "\t |";
        echo "Foto name: ";
        echo "\n";
        foreach ($array as $key) {
            if($key != NULL){
                $objetoJson = json_decode($key);
                
                echo $objetoJson->email;
                echo "\t |";
                
                echo $objetoJson->nombre;
                echo "\t |";
                
                echo $objetoJson->apellido;
                echo "\t |";
                
                echo $objetoJson->foto->name;
                echo "\n";
            }
        }
    }


    function modificarAlumno($archivo, $newAlumno){
        
        $newJson = json_decode($newAlumno->__tojson());
        if($archivo->existeJson($newJson, "email")){
            $jsonAnterior = $archivo->getJson($newJson, "email");
            $alumnoAnterior = new alumno($jsonAnterior->email, $jsonAnterior->nombre, $jsonAnterior->apellido, $jsonAnterior->foto);
            
            $array = explode(".", $alumnoAnterior->foto->name);            
            $imagenAnterior = "./fotos/".$alumnoAnterior.".".end($array);
            $enBackup = "./backUpFotos/".$alumnoAnterior->apellido."_".date("Y"). date("m").date("d").".".end($array);
            rename($imagenAnterior, $enBackup);

            $arrayNuevo = explode(".", $_FILES["foto"]["name"]);
            $imagen = "./fotos/".$newAlumno.".".end($arrayNuevo);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $imagen);


            $archivo->modificar($newJson, "email");
            
            return "alumno encontrado y modificado.";
        }else{
            return "El alumno no existe";
        }
        
    }


}
?>