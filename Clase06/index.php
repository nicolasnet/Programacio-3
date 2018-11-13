<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require_once './composer/vendor/autoload.php';
require_once './clases/cdApi.php';
require_once './clases/loginApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/


$app = new \Slim\App(["settings" => $config]);





$app->group('/cd', function(){

    $this->get('/', \cdApi::class.':traerTodos');
    
    $this->get('/{id}', \cdApi::class.':TraerUno'); //PREGUNTAR xq no funciona pasando parametros por get

    $this->post('/', \cdApi::class.':CargarUno');

    $this->delete('/', \cdApi::class . ':BorrarUno');

    $this->put('/', \cdApi::class . ':ModificarUno');
});


$app->post('/login', \loginApi::class. ':consulta');








//EJEMPLO SIMPLE DE API REST
/*
$app = new \Slim\App(["settings" => $config]);

$app->group('/saludar', function(){

    $this->get('[/]', function ($request, $response) {    
        $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    
    });

    $this->get('/lista', function ($request, $response) {    
        $response->getBody()->write("Hola mundo SlimFramework!!!");
    
    });
});
*/
/*
COMPLETAR POST, PUT Y DELETE
*/


/*
$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});
*/

/*
$app->get('/saludar[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("Hola mundo SlimFramework!!!");
    return $response;

});
*/

/*
MAS CODIGO AQUI...
*/


$app->run();

?>