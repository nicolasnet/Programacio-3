<?PHP

class alumno extends persona implements imaterias {
    public $legajo;

     //con estos iguales en el constructor simulamos la sobrecarga, para que no sea necesario pasarle parametros al constructor
    function __construct($nombre='', $apellido='', $legajo=0){
        parent::__construct($nombre, $apellido);
        $this->legajo = $legajo;
    }

    function saludar(){
        return parent::saludar().$this->legajo;
    }

    function inscribir($materia){
        
        if($this->legajo < 2000){
            return $this->nombre.$this->apellido.$this->legajo.". Se inscribio en: ".$materia;
        }
        else{
            return $this->nombre.$this->apellido.$this->legajo.". NO SE PUDO INSCRIBIR";
        }
    }
    
    function __GET($prop){
        return $prop;
    }
    
    /*
    function __SET($prop,$value){
        if(property_exists($this, $prop)){
            $this->$prop = $value;
        }
    }   

    */
    

}

?>