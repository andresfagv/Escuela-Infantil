<?php
//Llamada al modelo -- Intermediario entre vista y modelo !!!
require_once("../models/login_m.php");
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    $usertype=test_input($_POST['usertype']);

    if(login($password, $email)){
        session_start();
        $_SESSION['usertype'] = $usertype;

         // Redirigimos al usuario a la página correspondiente según su tipo de usuario
         switch ($usertype) {
            case 'admin':
                header("Location: ../views/views_admin/admin_page_v.php");
                break;
            case 'educador':
                header("Location: ../views/views_educador/educador_page_v.php");
                break;
            case 'padre':
                header("Location: ../views/views_padre/padre_page_v.php");
                break;
        }
        exit();

    }else{
        // Redirigimos al login nuevamente
        header("Location:../../");
    }

    

    



?>