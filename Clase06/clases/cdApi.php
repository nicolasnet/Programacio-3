<?php
require_once "./clases/cd.php";
require_once './composer/vendor/autoload.php';
//require_once "IApiUsable.php";
class cdApi{

    public function TraerUno($request, $response, $args){
        $id=$args['id'];
    	$elCd=cd::TraerUnCd($id);
     	$newResponse = $response->withJson($elCd, 200);  
		return $newResponse;
    }

    public function traerTodos($request, $response, $args){
        $losCd = cd::TraerTodos();
        $newResponse = $response->withJson($losCd, 200);
        return $newResponse;
        
    }



    public function CargarUno($request, $response, $args) {
            
        $objDelaRespuesta= new stdclass();
        
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $titulo= $ArrayDeParametros['titulo'];
        $cantante= $ArrayDeParametros['cantante'];
        $año= $ArrayDeParametros['anio'];
        
        $nuevoCD = new cd();
        $nuevoCD->titulo=$titulo;
        $nuevoCD->cantante=$cantante;
        $nuevoCD->año=$año;
        $nuevoCD->InsertarNuevoCdParametros();

        /* PARTE DE ARCHIVOS sin revisar

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);
        if(isset($archivos['foto']))
        {
            $nombreAnterior=$archivos['foto']->getClientFilename();
            $extension= explode(".", $nombreAnterior)  ;
            //var_dump($nombreAnterior);
            $extension=array_reverse($extension);
            $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        }       
        //$response->getBody()->write("se guardo el cd");

        */

        $objDelaRespuesta->respuesta="Nuevo CD guardado.";   
        return $response->withJson($objDelaRespuesta, 200);
    }



    public function BorrarUno($request, $response, $args) {
        $ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];
        $cd= new cd();
        $cd->id=$id;
        $cantidadDeBorrados=$cd->BorrarCd();

        $objDelaRespuesta= new stdclass();
        $objDelaRespuesta->cantidad=$cantidadDeBorrados;
        if($cantidadDeBorrados>0)
            {
                    $objDelaRespuesta->resultado="Se elimino el CD con ID= ".$ArrayDeParametros['id'];
            }
            else
            {
                $objDelaRespuesta->resultado="No se pudo borrar el CD CON ID= ".$ArrayDeParametros['id'];
            }
        $newResponse = $response->withJson($objDelaRespuesta, 200);  
        return $newResponse;
    }



    public function ModificarUno($request, $response, $args) {
        //$response->getBody()->write("<h1>Modificar  uno</h1>");
        $ArrayDeParametros = $request->getParsedBody();

        $micd = new cd();
        $micd->id=$ArrayDeParametros['id'];
        $micd->titulo=$ArrayDeParametros['titulo'];
        $micd->cantante=$ArrayDeParametros['cantante'];
        $micd->año=$ArrayDeParametros['anio'];

        $resultado =$micd->ModificarCdParametros();

        $objDelaRespuesta= new stdclass();  
        $objDelaRespuesta->resultado=$resultado;
        
        if($resultado != 0)
            $objDelaRespuesta->tarea="CD modificado";
        else
            $objDelaRespuesta->tarea="No se modifico el CD CON ID= ".$ArrayDeParametros['id'];

        return $response->withJson($objDelaRespuesta, 200);		
    }



}



?>