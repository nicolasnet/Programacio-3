<?php
require_once './composer/vendor/autoload.php';
require_once './clases/compra.php';
require_once './clases/AutJWT.php';

class compraApi{

    public function nuevaCompra($request, $response, $args){

        $arrayDeParametros = $request->getParsedBody();
        //var_dump($request->getParsedBody());
        $arrayConToken = $request->getHeader('token');
        $token=$arrayConToken[0];
        $payload=AutJWT::ObtenerData($token);        
        
        $respuesta = compra::crearCompra($arrayDeParametros, $payload[0]->email);


        $archivos = $request->getUploadedFiles();
        
        $foto= $archivos['imagen'];
        //var_dump($respuesta);

        if($respuesta>0){

            $nuevaCarpeta="IMGCompras";
            if(!file_exists($nuevaCarpeta))
            {
                mkdir($nuevaCarpeta);
            }
            $nuevoNombre="./".$nuevaCarpeta."/".$respuesta."-".$arrayDeParametros["marca"]."-".$arrayDeParametros["modelo"].".jpg";
            //var_dump($nuevoNombre);
            $foto->moveTo($nuevoNombre);

            $objDelaRespuesta->respuesta="Nueva compra guardado.";
        }
        else{
            $objDelaRespuesta->respuesta=$respuesta;   
        }
        
        return $response->withJson($objDelaRespuesta, 200);
    }





    public function traerTodos($request, $response, $args){   
        $compras = compra::TraerTodos();
        $newResponse = $response->withJson($compras, 200);
        return $newResponse;
    }


    public function traerUno($request, $response){
        $arrayConToken = $request->getHeader('token');
	    $token=$arrayConToken[0];
        $payload=AutJWT::ObtenerData($token);
        //var_dump($payload);
        //var_dump($payload[0]->email);
        
        $compras = compra::TraerUnoPorUsuario($payload[0]->email);
        $newResponse = $compras;
        return $newResponse;
    }


    public function traerTodosMarca($request, $response){
        
        $compras = compra::TraerTodosPorMarca($_GET["marca"]);
        //var_dump($compras);
        $newResponse = $response->withJson($compras, 200);
        return $newResponse;
    }
    
    
    public function traerProductos($request, $response){
        
        $listadoCompras = compra::TraerTodosProductos();
        $output = array();
        var_dump($listadoCompras);
        foreach($listadoCompras as $compra)
        {
            $objeto = "{'marca':".$compra->marca.", 'modelo':". $compra->modelo."}";
            var_dump(json_decode($objeto));

            array_push($output, $compra->marca." ".$compra->modelo);
        }

        $newResponse = $response->withJson($output, 200);
        return $newResponse;
    }




}






?>