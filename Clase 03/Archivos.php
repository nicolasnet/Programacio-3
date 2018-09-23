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
















     /*
        $lista = json_encode($alumno1);
        $alumno2 = json_decode($lista);
        echo $alumno2->apellido;
        */
        //echo $alumno1;
        //$alumno2 = $alumno1->__tojson();




/*
Modos de abrir

r

w

a

x



siempre cerrar archivo luego de usarlo para liberlo;  


manejar objetos en JS para guardarlo en archivo

JSON{
    "nombre": "pepe";
    "apellido": "diaz";
    "legajo": "111";
}

json_encode();
json_decode();

*/

/*

$archivo = fopen("legajos.txt", "a+");
$separador = "/";

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['legajo'])){
    $alumno1 = new alumno($_POST['nombre'], $_POST['apellido'], $_POST['legajo']);
    
        echo $alumno1->nombre;
        echo $alumno1->apellido;
        echo $alumno1->legajo;

    fwrite ($archivo, $_POST['nombre'].$separador.$_POST['apellido'].$separador.$_POST['legajo'].PHP_EOL);


*/


//fwrite ($archivo, "como va");

//fwrite ($archivo, "escribiiiiiir algo".PHP_EOL);//PHP_EOL es para agregar salto de linea en el lenguaje en q este

//echo fread($archivo, filesize("nombrearchivo.txt"));
//echo fgets($archivo);
//echo fgets($archivo)."<br>";
/*
while(!feof($archivo)){
    echo fgets($archivo)."<br>";
}
*/

//copy("nombrearchivo.txt", "probando.txt");

//unlink("probando.txt"); //eliminar archivo

/*

    fclose($archivo);
}else{
    echo "falta algo";
}
*/

/*

$archivo = fopen("legajos.txt", "r");
$separador = "/";



while(!feof($archivo)){
    $linea = fgets($archivo);
    $array = explode($separador, $linea);
        
    //echo $separador;
    
    echo $array[0];    
    //echo "---";
    
    
    echo $array[1];
    //echo "---";
    
    echo $array[2];
    

    if(trim($array[2]) == $_GET['legajo']){ //trim ->   elimina los espacios al inicio y final del array

        echo $array[0];
        echo $array[1];
        echo $array[2];
    }
    
}




fclose($archivo);

*/




?>