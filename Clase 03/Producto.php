<?PHP
class Producto{
    public $nombre;
    public $codBarra;


    function __construct($nombre='', $codBarra=''){
        $this->nombre = $nombre;
        $this->codBarra = $codBarra;
    }


    function __tostring(){
        return $this->nombre."_".$this->codBarra;
    }


    function __tojson(){ //paso un objeto alumno a un string con el formato de json
        return $lista = json_encode($this);
    
    //$json = json_decode($lista);
    //return $json;   
    }


}
?>