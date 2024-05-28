<?php
// login_c.php

require_once("../../db/db.php");

if (isset($_GET['id'])) {
    $id_estudiante = $_GET['id'];
    $datos = obtenerDatosEstudiante($id_estudiante);
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function ObtenerCursos() {
    global $conn;
    try {
        $sql = "SELECT id, nombre FROM clase";
        $stmt = $conn->query($sql);
        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cursos;
    } catch (PDOException $e) {
        error_log("Error al obtener cursos: " . $e->getMessage());
        return false;
    }
}

function obtenerDatosEstudiante($id_estudiante) {
    global $conn;
    try {
        $sql = "SELECT estudiante.nombre AS nombre_estudiante, estudiante.apellido AS apellido_estudiante, estudiante.f_nacimiento, estudiante.sexo AS sexo_estudiante,
                       estudiante.alergias, estudiante.comentarios, estudiante.img, padre.nombre AS nombre_padre, padre.apellido AS apellido_padre, 
                       padre.email AS email_padre, padre.tel AS tel_padre, padre.relacion, padre.sexo AS sexo_padre, padre.DNI, 
                       inscripcion.id_clase AS id_curso
                FROM estudiante
                INNER JOIN padre ON padre.id_alumno = estudiante.id 
                INNER JOIN inscripcion ON inscripcion.id_estudiante = estudiante.id 
                WHERE estudiante.id = :id_estudiante";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

function editarAlumno($id_alumno, $nombre_alumno, $apellido_alumno, $f_nacimiento, $sexo_alumno, $alergias, $nombre_foto_extension, $comentarios) {
    global $conn;

    $sql = "UPDATE estudiante 
            SET nombre = :nombre, apellido = :apellido, f_nacimiento = :f_nacimiento, 
                sexo = :sexo, alergias = :alergias, img = :img, comentarios = :comentarios 
            WHERE id = :id_alumno";
    
    try {
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->errorInfo()[2]);
        }

        $stmt->bindParam(':id_alumno', $id_alumno);
        $stmt->bindParam(':nombre', $nombre_alumno);
        $stmt->bindParam(':apellido', $apellido_alumno);
        $stmt->bindParam(':f_nacimiento', $f_nacimiento);
        $stmt->bindParam(':sexo', $sexo_alumno);
        $stmt->bindParam(':alergias', $alergias);
        $stmt->bindParam(':img', $nombre_foto_extension);
        $stmt->bindParam(':comentarios', $comentarios);

        if ($stmt->execute()) {
            return true; // La actualización fue exitosa
        } else {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->errorInfo()[2]);
        }
    } catch (PDOException $pdoe) {
        // Error de PDO (por ejemplo, problema de conexión)
        echo "Error de PDO: " . $pdoe->getMessage();
    } catch (Exception $e) {
        // Otros errores
        echo "Error: " . $e->getMessage();
    }

    return false; // En caso de error, retorna falso
}

function editarPadre($id_padre, $id_user, $nombre_padre, $apellido_padre, $email, $telefono, $relacion, $sexo_padre, $dni, $id_alumno) {
    global $conn;

    $sql = "UPDATE padre 
            SET id_user = :id_user, nombre = :nombre, apellido = :apellido, email = :email, 
                tel = :tel, id_alumno = :id_alumno, relacion = :relacion, sexo = :sexo, dni = :dni 
            WHERE id = :id_padre";
    
    try {
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->errorInfo()[2]);
        }

        $stmt->bindParam(':id_padre', $id_padre);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':nombre', $nombre_padre);
        $stmt->bindParam(':apellido', $apellido_padre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $telefono);
        $stmt->bindParam(':id_alumno', $id_alumno);
        $stmt->bindParam(':relacion', $relacion);
        $stmt->bindParam(':sexo', $sexo_padre);
        $stmt->bindParam(':dni', $dni);

        if ($stmt->execute()) {
            return true; // La actualización fue exitosa
        } else {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->errorInfo()[2]);
        }
    } catch (PDOException $pdoe) {
        // Error de PDO (por ejemplo, problema de conexión)
        echo "Error de PDO: " . $pdoe->getMessage();
    } catch (Exception $e) {
        // Otros errores
        echo "Error: " . $e->getMessage();
    }

    return false; // En caso de error, retorna falso
}


function editarInscribirEstudianteEnClase($id_clase, $id_estudiante) {
    global $conn;

    try {
        // Verificar si la inscripción ya existe
        $sql = "SELECT COUNT(*) FROM Inscripcion WHERE id_estudiante = :id_estudiante";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_estudiante', $id_estudiante);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // La inscripción existe, actualizarla
            $sql = "UPDATE Inscripcion SET id_clase = :id_clase WHERE id_estudiante = :id_estudiante";
        } else {
            // La inscripción no existe, insertarla
            $sql = "INSERT INTO Inscripcion (id_clase, id_estudiante) VALUES (:id_clase, :id_estudiante)";
        }

        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_clase', $id_clase);
        $stmt->bindParam(':id_estudiante', $id_estudiante);
        $stmt->execute();

        return true; // La actualización/inserción fue exitosa
    } catch (PDOException $e) {
        // Capturar cualquier excepción de PDO
        error_log("Error al inscribir estudiante en clase: " . $e->getMessage());
        return false;
    }
}

function obtenerPadreYUsuarioPorIdEstudiante($id_estudiante) {
    global $conn;

    $sql = "SELECT padre.id AS id_padre, padre.id_user 
            FROM padre
            INNER JOIN estudiante ON padre.id_alumno = estudiante.id
            WHERE estudiante.id = :id_estudiante";

    try {
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->errorInfo()[2]);
        }

        $stmt->bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result; // Retorna el resultado como un array asociativo
        } else {
            throw new Exception("No se encontró el padre para el id_estudiante proporcionado.");
        }
    } catch (PDOException $pdoe) {
        // Error de PDO (por ejemplo, problema de conexión)
        echo "Error de PDO: " . $pdoe->getMessage();
    } catch (Exception $e) {
        // Otros errores
        echo "Error: " . $e->getMessage();
    }

    return false; // En caso de error, retorna falso
}




?>