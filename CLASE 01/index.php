<?php
    //Declaracion de variables $ y nombre de variable
    $nombre="CRISTIAN";
    $apellido="TORRES";
    //echo $nombre

    //Concatenación de variables en string con el .(punto)
    //echo "Hola ".$nombre;

    //Variable dentro del string
    echo "Hola $nombre $apellido";

    //Dentro de comillas dobles se pueden colocar variables, comillas simples no.
    //echo 'Hola $nombre';

    //STRLen(); STRCMP(); STRTOLOWER(); UCFIRST(); SUBSTR()
    
    /*echo "\r\n";
    echo "Longitud Nombre: ", STRLEN($nombre); //Length
    echo "\r\n";
    echo "Longitud Apellido: ", STRLEN($apellido);//Length
    echo "\r\n";
    echo STRTOLOWER($nombre); //pasar a minuscula
    echo "\r\n";
    echo STRTOLOWER($apellido); //pasar a minuscula
    echo "\r\n";
    echo STRCMP($nombre,$apellido); //comparar contenido
    echo "\r\n";
    echo UCFIRST(STRTOLOWER($nombre)); //colocar primera letra mayuscula
    echo "\r\n";
    echo SUBSTR($nombre,0,4); //Obtener de un string los caracteres que le indicamos, 0=comienzo 4=final
    */

    //ARRAYS
    $vec=array(4,5,6);
    $vec[0]=1;
    $vec[1]=2;
    //$vec['a']=3;
    echo "\r\n";
    echo "Muestro valor del vector ".$vec[1];
    echo "\r\n";
    //echo $vec['a'];
    //VAR_DUMP($vec);
    /*for ($i=0; $i < Count($vec) ; $i++) { 
        echo "<br>";
        echo "Muestro valor del vector ".$vec[$i];
    }*/
    foreach ($vec as $value) {
        echo "<br> $value";
    }
    //foreach para saber el index del vector en el que estoy, key-value
    foreach ($vec as $key => $value) {
        echo "<br> $key, $value";
    }



?>