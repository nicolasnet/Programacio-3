<?PHP
require_once "./proveedor.php";
require_once "./Archivos.php";
require_once "./pedido.php";

$proveedor;

$opcion = $_REQUEST['caso'];

switch($opcion){

    case "cargarProveedor":
        $archivo = new Archivos("./proveedores.txt", $_FILES["foto"]);
        if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_FILES['foto']) ){
            $proveedor = new proveedor($_POST['id'],$_POST['nombre'], $_POST['email'], $_FILES['foto']);
        }
        echo $proveedor->cargarProveedor($archivo, $proveedor);
        break;

    case "consultarProveedor":
        $archivo = new Archivos("./proveedores.txt");
        $proveedor = new proveedor("", $_GET['nombre']);
        echo $proveedor->consultarProveedor($archivo, $proveedor);
        break;

    case "proveedores":
        $archivo = new Archivos("./proveedores.txt");
        $proveedor = new proveedor();
        echo $proveedor->proveedores($archivo);
        break;

//SEGUNDA PARTE:

    case "hacerPedido":        
        $archivoProv = new Archivos("./proveedores.txt");
        $archivoPedidos = new Archivos("./pedidos.txt");
        if(isset($_POST['producto']) && isset($_POST['cantidad']) && isset($_POST['id']) ){
            $pedido = new Pedido($_POST['producto'],$_POST['cantidad'], $_POST['id']);
        }
        
        echo $pedido->hacerPedido($archivoProv,$archivoPedidos);
    
        break;

    case "listarPedidos":
        $archivoProv = new Archivos("./proveedores.txt");
        $archivoPedidos = new Archivos("./pedidos.txt");

        $pedido = new Pedido();
        $pedido->listarPedidos($archivoProv, $archivoPedidos);

        break;

    case "listarPedidoProveedor":    
        $archivoPedidos = new Archivos("./pedidos.txt");
        if(isset($_GET['id']) ){
            $idProv = $_GET['id'];
            $pedido = new Pedido();        
        }
        $pedido->listarPedidoProveedor($archivoPedidos, $idProv);
        break;


//TERCERA PARTE:
    case "modificarProveedor":
        $archivo = new Archivos("./proveedores.txt", $_FILES["foto"]);
        if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_FILES['foto']) ){
            $proveedor = new proveedor($_POST['id'],$_POST['nombre'], $_POST['email'], $_FILES['foto']);
        }
        echo $proveedor->modificarProveedor($archivo, $proveedor);
        break;


    case "fotosBack":
        $proveedor = new Proveedor();
        $proveedor->fotosBack();
        break;

}

?>