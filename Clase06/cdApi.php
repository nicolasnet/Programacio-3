<?php
require_once "./cd.php";
require_once './vendor/autoload.php';
//require_once "IApiUsable.php";
class cdApi{

    public function TraerUno($request, $response, $args){
        
        //$id=$args['id'];
        $id=1;
        $elCd = cd::TraerUnCd(1);
        $newResponse = $response->witchJson($elCd, 200);
        return $newResponse;
        
    }


    public function traerTodos($request, $response, $args){
        //echo "hila";
        
        $losCd = cd::TraerTodos();
        //$newResponse = $response->witchJson($losCd, 200);
        return $losCd;
        
    }
}





?>