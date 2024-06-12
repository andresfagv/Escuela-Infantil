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
?>