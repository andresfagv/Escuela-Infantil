<?php

require_once("../../db/db.php");
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getAllDatosEstudiantes()
{
    global $conn;
    try {
        $sql = "SELECT estudiante.id AS id_estudiante, 
        estudiante.nombre AS nombre_estudiante, 
        estudiante.apellido AS apellido_estudiante, 
        clase.nombre AS nombre_clase, 
        estudiante.f_nacimiento, 
        estudiante.img,
        GROUP_CONCAT(padre.nombre SEPARATOR ', ') AS nombres_padres, 
        GROUP_CONCAT(padre.apellido SEPARATOR ', ') AS apellidos_padres, 
        GROUP_CONCAT(padre.tel SEPARATOR ', ') AS telefonos_padres
 FROM estudiante
 INNER JOIN padre ON padre.id_alumno = estudiante.id 
 INNER JOIN inscripcion ON inscripcion.id_estudiante = estudiante.id 
 INNER JOIN clase ON inscripcion.id_clase = clase.id
 GROUP BY estudiante.id, estudiante.nombre, estudiante.apellido, clase.nombre, estudiante.f_nacimiento, estudiante.img; ";

        $stmt = $conn->query($sql);
        $array_estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $array_estudiantes;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}



function deleteEstudianteById($id)
{
    global $conn;
    try {
        // Ahora, elimina el registro de la tabla users usando el user_id obtenido
        $stmt = $conn->prepare("DELETE FROM estudiante WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        // Manejar cualquier error
        error_log($e->getMessage());
        return false; // Devolver false en caso de error
    }
}


?>