
<?php
session_start();
require_once("../../models/models_educador/educador_listar_biblioteca_m.php");

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'alquilar':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_articulo = test_input($_POST['id_articulo']);
            $id_alumno = test_input($_POST['id_alumno']);
            echo $id_alumno;
            echo $id_articulo;

            if ($id_articulo && $id_alumno) {
                alquilarArticulo($id_articulo, $id_alumno);
                header('Location: ../../controllers/controllers_educador/educador_listar_biblioteca_c.php');
                exit;
            }
        }

        break;
    case 'devolver':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if ($id) {
            devolverArticulo($id);
            header('Location: ../../controllers/controllers_educador/educador_listar_biblioteca_c.php');
        }
        break;
    default:
        $productos_disponible = getAllProductosDisponible();
        $productos_no_disponible = getAllProductosNODisponible();

        $alumnos =  getAllEstudiantes();


        include '../../views/views_educador/educador_listar_biblioteca_v.php';
        break;
}

?>


