<?PHP
    require_once "./persona.php";
    require_once "./imaterias.php";
    require_once "./alumno.php";
    
    if(isset($_GET['nombre'])){

    
    //var_dump($_GET); //ese GET es un array
    /*
    if(isset($_GET['nombre'])){  //este metodo devuelve un booleano, para saber si la clave existe o no
        echo $_GET['nombre'];
    }
    */

    $alumno1 = new alumno($_GET['nombre'], $_GET['apellido'], $_GET['legajo']);

    //var_dump($alumno1->inscribir("Matematica"));

    echo $alumno1 -> __GET($alumno1->nombre);

    echo $alumno1->nombre;
    echo $alumno1->apellido;
    echo $alumno1->legajo;


    }else{
        echo "no se pudo";
    }

    /*
    var_dump($_POST);
    echo $_POST['nombre'];
    die();
    */

    //var_dump ($_REQUEST); //ESTE SIRVE PARA TODOS: POST, GET, DELETE.... ETC
    //var_dump ($_SERVER); // con este en el REQUEST_METOD te dice q tipo es.
    

    /*
    die();



    //$per1 = new PERSONA();
    //$per1 -> nombre = 'PEPE';
    $alumno1 = new alumno("juan", "perez", 1999);
    //$alumno1 = new alumno();

    echo $alumno1 -> saludar();

    var_dump($alumno1->inscribir("Matematica"));
    //var_dump($per1);
    //var_dump($per1->Saludar());
    //var_dump($per1::saludar());//llamamos a un metodo estatico
    //$per1::saludar()//se llama al metodo pero seria sin ver el return.
    */
?>