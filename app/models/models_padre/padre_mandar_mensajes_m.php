<?php
require_once("../../db/db.php");
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function obtenerTodosLosPadres(){
    global $conn;
    try {
        // Preparar la consulta SQL
        $sql = "SELECT estudiante.img as imgEstu, estudiante.nombre as nomEstu, estudiante.apellido as apeEstu, padre.nombre as nomPad, padre.email as emailPad, padre.id FROM padre JOIN estudiante ON estudiante.id=padre.id_alumno;";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $array_padres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $array_padres;
    } catch (Exception $e) {
        // Registrar el error
        error_log($e->getMessage());
        return false;
    }
}


function getAllClases() {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT * FROM clase");
        $stmt->execute();
        $array_clases = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $array_clases;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}


function enviarMensaje($idPadre, $titulo, $contenido, $idEducador){
    global $conn;
    $fechaHoy = date('Y-m-d');
    try {
        $stmt = $conn->prepare("INSERT INTO `mensajes` ( `id_educador`, `id_padre`, `titulo`, `contenido`, `fecha_envio`) VALUES (:idEducador, :idPadre, :titulo, :contenido, :fecha);");
        $stmt->bindParam(':idPadre', $idPadre);
        $stmt->bindParam(':idEducador', $idEducador);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':fecha', $fechaHoy);
        
        

        $stmt->execute();


        //return $array_clases;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}



function enviarMensajeAClase($claseId, $titulo, $contenido) {
    // Aquí va la lógica para enviar el mensaje a una clase
    // Ejemplo:
    // obtenerPadresPorClase($claseId);
    // foreach ($padres as $padre) {
    //     enviarMensaje($padre['id'], $titulo, $contenido);
    // }
}
?>