<?php
require_once "./AccesoDatos.php";
require_once "./cd.php";

$cd = new cd();

$opcion = $_REQUEST['caso'];

switch($opcion){

    case "traertodos":
        $cd->TraerTodos();
        break;
    
        
    case "guardar":
        
        break;
    
    
    case "modificar":
        
        break;


    case "borrar":
    
        break;


    case "traerxId":
    
        break;

}






?>