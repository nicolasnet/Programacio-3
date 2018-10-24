<?PHP
require_once "./alumno.php";
require_once "./Archivos.php";
require_once "./materia.php";
require_once "./inscripcion.php";

$alumno;

$opcion = $_REQUEST['caso'];

switch($opcion){

    case "cargarAlumno":
        $archivo = new Archivos("./alumnos.txt", $_FILES["foto"]);
        if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_FILES['foto']) ){
            $alumno = new alumno($_POST['email'],$_POST['nombre'], $_POST['apellido'], $_FILES['foto']);
        }
        echo $alumno->cargarAlumno($archivo, $alumno);
        break;

    case "consultarAlumno":
        $archivo = new Archivos("./alumnos.txt");
        $alumno = new alumno("","", $_GET['apellido']);
        echo $alumno->consultAralumno($archivo, $alumno);
        break;

    case "cargarMateria":        
        $archivoMaterias = new Archivos("./materias.txt");
        if(isset($_POST['codigoM']) && isset($_POST['nombreM']) && isset($_POST['cupo']) && isset($_POST['aula']) ){
            $cupo = $_POST['cupo'];
            $materia = new Materia($_POST['codigoM'],$_POST['nombreM'], (int) $cupo, $_POST['aula']);
        }        
        echo $materia->cargarMateria($archivoMaterias);    
        break;


    case "inscribirAlumno":
        $archivoAlumnos = new Archivos("./alumnos.txt");
        $archivoinscripciones = new Archivos("./inscripciones.txt");
        $archivoMaterias = new Archivos("./materias.txt");

        if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['codigoM']) && isset($_POST['nombreM']) ){
            $inscripcion = new Inscripcion( $_POST['codigoM'], $_POST['nombreM'],$_POST['nombre'], $_POST['apellido'], $_POST['email']);
        }
        echo $inscripcion->inscribirAlumno($archivoAlumnos, $archivoMaterias, $archivoinscripciones);
        break;

    case "modificarAlumno":
        $archivo = new Archivos("./alumnos.txt", $_FILES["foto"]);
        if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_FILES['foto']) ){
            $alumno = new alumno($_POST['email'],$_POST['nombre'], $_POST['apellido'], $_FILES['foto']);
        }
        echo $alumno->modificarAlumno($archivo, $alumno);
        break;


    case "alumnos":
        $archivo = new Archivos("./alumnos.txt");
        $alumno = new alumno();
        echo $alumno->alumnos($archivo);
        break;


    case "inscripciones":
        $archivo = new Archivos("./inscripciones.txt");
        $inscripcion = new Inscripcion();
        $parametro = " ";
        $valorParametro = " ";
        if(isset($_GET['apellido'])){
            $parametro = "apellido";
            $valorParametro = $_GET['apellido'];
        }
        if(isset($_GET['codigoM'])){
            $parametro = "codigoM";
            $valorParametro = $_GET['codigoM'];
        }

        if($parametro != " " && $valorParametro != " "){
            echo $inscripcion->inscripciones($archivo, $parametro, $valorParametro);
        }else{
            echo $inscripcion->inscripciones($archivo);
        }
        break;



}

?>