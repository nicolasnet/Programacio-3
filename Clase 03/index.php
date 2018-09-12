<?PHP
require_once "./Producto.php";
require_once "./Archivos.php";

$producto;
$archivo = new Archivos("", $_FILES["fotoDos"]);

if(isset($_POST['nombre']) && isset($_POST['codBarra'])){
    $producto = new producto($_POST['nombre'], $_POST['codBarra']);
}

var_dump($_FILES); //te muestra los datos del archivo que estamos tratando de mandar



$tipoAdmitido = "image";
$tamanioMax = 3145728; //3 megas = 3145728 bytes



$type = explode("/", $_FILES["fotoDos"]["type"]);

echo $archivo->validarTamanio($tamanioMax);



if($_FILES["fotoDos"]["size"]<= $tamanioMax){
    $boolTamanio = true;
}else{
    echo "supera el tamaño permitido el cual son Byte: ".$tamanioMax;
}

if($type[0] == $tipoAdmitido){
    $boolTipo = true;
}else{
    echo "No coincide con el tipo de archivo admitido: ".$tipoAdmitido;
}




if($boolTamanio == true && $boolTipo == true){

    $archivo = new Archivos("./productos.txt");

    $archivo->guardar(json_encode($producto));

    $array = explode(".", $_FILES["fotoDos"]["name"]);//traigo todo el nombre de la imagen(incluye la extencion)

    //hay que tener cuidado si el nombre del archivo tiene mas de un punto, en ese caso generaria mas de 2 string en el array

    $imagen = "./Fotos/".$producto.".".end($array);//usando end() me devuelve el ultimo string del array, sin importar cuantos array se creen

    if(!file_exists($imagen)){
        move_uploaded_file($_FILES["fotoDos"]["tmp_name"], $imagen);//esta funcion revisa que sea mandada por POST y la guarda en la direccion dada

    }else{
        $enBackup = "./Backup/".$producto->nombre."_".$producto->codBarra.".".end($array).time();
        rename($imagen, $enBackup);
        move_uploaded_file($_FILES["fotoDos"]["tmp_name"], $imagen);
    }
}

?>