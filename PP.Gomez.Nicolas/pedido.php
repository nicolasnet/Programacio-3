<?PHP
require_once "./Archivos.php";

class Pedido{
    
    public $producto;
    public $cantidad;
    public $id;
       


    function __construct($producto='',$cantidad='', $id=''){
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->id = $id;        
    }


    function __tostring(){
        return $this->producto."_".$this->cantidad."_".$this->id;
    }


    function __tojson(){ //paso un objeto producto a un string con el formato de json
        return $lista = json_encode($this);
    }





    function hacerPedido($archivoProv, $archivoPedidos){

        if($archivoProv->existeProv($archivoProv->arrayToJason($archivoProv->abrir()), "id" ,$this->id)){//si el id existe, lo agrega al TXT.

            $archivoPedidos->guardar(json_encode($this));
            return "nuevo pedido guardado";
        }
        else{
            return "ID de proovedor no existe";
        }
    }


    function listarPedidos($archivoProv, $archivoPedidos){
        $arrayPedidos = $archivoPedidos-> arrayToJason($archivoPedidos->abrir());
        $arrayProv = $archivoProv-> arrayToJason($archivoProv->abrir());

        foreach ($arrayPedidos as $keyPedido) {
            echo "Prod: ".$keyPedido->producto." Cant: ".$keyPedido->cantidad." Id Prov: ".$keyPedido->id;
            foreach($arrayProv as $keyProv){
                if($keyProv->id == $keyPedido->id){
                    echo " Proveedor: ".$keyProv->nombre;
                    break;
                }
            }
            echo "\n";
        }
    }

    function listarPedidoProveedor($archivoPedidos, $idProveedor){
        $arrayPedidos = $archivoPedidos-> arrayToJason($archivoPedidos->abrir());
        foreach ($arrayPedidos as $keyPedido) {
            if($keyPedido->id == $idProveedor){
                echo "Prod: ".$keyPedido->producto." Cant: ".$keyPedido->cantidad." Id Prov: ".$keyPedido->id;            
                echo "\n";
            }
        }
    }


    
}
?>