<?php
require_once './composer/vendor/autoload.php';
require_once './clases/compra.php';
require_once './clases/AutJWT.php';

class compraApi{

    public function nuevaCompra($request, $response, $args){
        $arrayDeParametros = $request->getParsedBody();
        $respuesta = compra::crearCompra($arrayDeParametros);

        if($respuesta>0){
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




}






?>