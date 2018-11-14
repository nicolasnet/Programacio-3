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



}


?>