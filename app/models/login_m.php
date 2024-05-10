<?php
// login_c.php

require_once("../db/db.php");


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function login($password, $email) {
        global $conn;
        try {
            // Preparar la consulta SQL
            $stmt = $conn->prepare("SELECT password_hash, password_salt FROM users WHERE email = :email");
    
            // Asociar parámetros
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verificar si se encontró el email en la base de datos
            if ($result) {
                $password_hash = $result['password_hash'];
                $password_salt = $result['password_salt'];
    
                // Generar el hash de la contraseña proporcionada
                $hashed_password = hash('sha256', $password . $password_salt);
    
                // Verificar si el hash generado coincide con el hash almacenado
                if ($hashed_password === $password_hash) {
                    // La contraseña es correcta, iniciar sesión
                    return true;
                } else {
                    // La contraseña es incorrecta
                    return false;
                }
            } else {
                // No se encontró el email en la base de datos
                return false;
            }
        } catch (PDOException $ex) {
            // Manejo de errores
            echo $ex->getMessage();
            return false;
        }
    }


