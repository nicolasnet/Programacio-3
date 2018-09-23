<?PHP

require_once "./Producto.php";
require_once "./Archivos.php";

/*
$archivo = new Archivos("./productos.txt");


$arrayJson = $archivo->arrayToJason($archivo->abrir());

if(isset($_POST['nombre']) && isset($_POST['codBarra'])){
    $producto = new producto($_POST['nombre'], $_POST['codBarra']);
}

if(!$archivo->existeJson($arrayJson, json_decode($producto->__tojson()), "codBarra")){
    $arrayJson[]= json_decode($producto->__tojson());
}
else{
    echo "funca\n";
}

var_dump($arrayJson);
*/



//var_dump($_FILES); //te muestra los datos del archivo que estamos tratando de mandar

$producto;
$archivo = new Archivos("./productos.txt", $_FILES["fotoDos"]);

if(isset($_POST['nombre']) && isset($_POST['codBarra'])){
    $producto = new producto($_POST['nombre'], $_POST['codBarra']);
}


$tipoAdmitido = "image";
$tamanioMax = 3145728; //3 megas = 3145728 bytes


if($archivo->validarTamanio($tamanioMax) == true && $archivo->validarTipo($tipoAdmitido) == true){

    if(!$archivo->existeJson($archivo->arrayToJason($archivo->abrir()),json_decode($producto->__tojson()), "codBarra")){//si el codigo de barras existe, no lo agrega al TXT.
        $archivo->guardar(json_encode($producto));
    }
    $array = explode(".", $_FILES["fotoDos"]["name"]);//traigo todo el nombre de la imagen(incluye la extencion)

    //hay que tener cuidado si el nombre del archivo tiene mas de un punto, en ese caso generaria mas de 2 string en el array

    $imagen = "./Fotos/".$producto.".".end($array);//usando end() me devuelve el ultimo string del array, sin importar cuantos array se creen

    if(!file_exists($imagen)){
        move_uploaded_file($_FILES["fotoDos"]["tmp_name"], $imagen);//esta funcion revisa que sea mandada por POST y la guarda en la direccion dada

    }else{
        $enBackup = "./Backup/".$producto->nombre."_".$producto->codBarra."_".time().".".end($array);
        rename($imagen, $enBackup);
        move_uploaded_file($_FILES["fotoDos"]["tmp_name"], $imagen);
    }
}

var_dump($archivo->arrayToJason($archivo->abrir()));
?>