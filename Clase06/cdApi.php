<?php
require_once "./cd.php";
//require_once "IApiUsable.php";
class cdApi extends cd{

    public function TraerUno($request, $response, $args){
        $id=$args['id'];
        $elCd = cd::TraerUnCd($id);
        $newResponse = $response->witchJson($elCd, 200);
        return $newResponse;
    }
}





?>