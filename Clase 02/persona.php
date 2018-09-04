<?PHP
class persona{
    public $nombre;
    public $apellido;
    
    function saludar(){
        //echo "hola";
        //echo "hola".$nombre;
        return "hola".$this->nombre;
    }

    function __construct($nombre, $apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
}





?>