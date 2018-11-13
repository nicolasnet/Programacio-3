<?php
require_once './composer/vendor/autoload.php';
require_once './clases/login.php';
require_once './clases/AutJWT.php';

class loginApi{

    public function consulta($request, $response, $args){
        $arrayDeParametros = $request->getParsedBody(); 
        //var_dump($arrayDeParametros);
        //var_dump($arrayDeParametros["user"]);
        $respuesta = login::consultaLogin($arrayDeParametros);

        if($respuesta !=NULL)
            $newResponse = $response->withJson(AutJWT::CrearToken($respuesta), 200);
        else
            $newResponse = $response->withJson("User no valido", 404);

        return $newResponse;

        
        
    }
}


?>