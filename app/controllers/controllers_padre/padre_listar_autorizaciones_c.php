<?php
require_once("../../controllers/controllers_padre/padre_checklog.php");
require_once("../../models/models_padre/padre_listar_autorizaciones_m.php");


$action = isset($_GET['action']) ? test_input($_GET['action']) : '';
$id_estudiante = $_SESSION['id_alumno'];



switch ($action) {
    case 'delete':
        $id = isset($_GET['id']) ? test_input($_GET['id']) : '';
        if ($id) {
            eliminarDocumento($id);
            header('Location: ../../controllers/controllers_padre/padre_listar_autorizaciones_c.php');
            exit();
        }
        break;
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_estudiante = $_POST['id_estudiante'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $pdf = $_FILES['pdf'];

            // Verificar que el archivo es un PDF
            if ($pdf['type'] === 'application/pdf' && $pdf['error'] === UPLOAD_ERR_OK) {
                $upload_dir = '../../../media/files/autorizacion/' . $id_estudiante;

                // Verificar si la carpeta existe, si no, crearla
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                $ruta = obtenerruta($id_estudiante, $nombre) . '.pdf';
                $upload_path = $upload_dir . '/' . $ruta;

                // Mover el archivo subido a la ruta de destino
                if (move_uploaded_file($pdf['tmp_name'], $upload_path)) {
                    // Llamar a la función agregarDocumento para insertar los datos en la base de datos
                    if (agregarDocumento($id_estudiante, $nombre, $ruta, $descripcion)) {
                        echo "Documento subido y registrado correctamente.";
                    } else {
                        echo "Error al registrar el documento en la base de datos.";
                    }
                } else {
                    echo "Error al mover el archivo subido.";
                }
            } else {
                echo "Por favor, suba un archivo PDF válido.";
            }

            header('Location: ../../controllers/controllers_padre/padre_listar_autorizaciones_c.php');
            exit();
        }
        break;
    default:
            include '../../views/views_padre/padre_listar_autorizaciones_v.php';
        break;
}
