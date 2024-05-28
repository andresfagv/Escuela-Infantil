<?php
session_start();
require_once("../../models/models_admin/admin_crear_alumno_m.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel Control Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../../public/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../../public/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="../../../public/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../../public/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="icon" href="../../../public/img/icon.PNG" type="image/png">

    <script>
        function confirmarEnvio() {
            return confirm("¿Estás seguro de que quieres crear este alumno?");
        }
    </script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../views/views_admin/admin_page_v.php">Panel Control</a>
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"><a href="../../logout.php" class="btn  square-btn-adjust">Cerrar Sesión</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../../../public/img/administracion.png" class="user-image img-responsive" />
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/salon-de-clases.png"> Clases<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_clase_c.php">Ver</a>
                            </li>
                            <li>
                                <a href="../../controllers/controllers_admin/admin_crear_clase_c.php">Crear</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/educador.png"> Educadores<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_educadores_c.php">Ver</a>
                            </li>
                            <li>
                                <a href="../../controllers/controllers_admin/admin_crear_educador_c.php">Crear</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/ninos.png"> Alumnos<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_alumnos_c.php">Ver</a>
                            </li>
                            <li>
                                <a href="../../controllers/controllers_admin/admin_crear_alumno_c.php">Crear</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/contactos.png"> Contactos<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_contacto_c.php">Ver</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/biblioteca.png"> Biblioteca<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_biblioteca_c.php">Ver</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/camara.png"> Galeria<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../../controllers/controllers_admin/admin_listar_galeria_c.php">Ver</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Crear Alumno</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Datos Alumno
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirmarEnvio();">
                                            <fieldset>
                                                <legend>Datos Alumno</legend>
                                                <div class="form-group">
                                                    <label>Nombre Alumno *</label>
                                                    <input class="form-control" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre del Alumno" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido Alumno *</label>
                                                    <input class="form-control" id="apellido_alumno" name="apellido_alumno" placeholder="Apellido del Alumno" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Fecha de Nacimiento *</label>
                                                    <input class="form-control" type="date" id="f_nacimiento" name="f_nacimiento" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Sexo *</label>
                                                    <select class="form-control" id="sexo_alumno" name="sexo_alumno" required>
                                                        <option value="hombre">Hombre</option>
                                                        <option value="mujer">Mujer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Foto Perfil</label>
                                                    <input type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Alergias</label>
                                                    <textarea class="form-control" id="alergias" name="alergias"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comentarios</label>
                                                    <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Curso</legend>
                                                <div class="form-group">
                                                    <select class="form-control" name="curso">
                                                        <?php
                                                        // Llamamos a la función para obtener los cursos
                                                        $cursos = ObtenerCursos();

                                                        // Verificamos si se obtuvieron cursos
                                                        if ($cursos) {
                                                            // Iteramos sobre los cursos y creamos las opciones
                                                            foreach ($cursos as $curso) {
                                                                echo '<option name="curso" value="' . $curso['id'] . '">' . $curso['nombre'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option value="">No hay cursos disponibles</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </fieldset>


                                            <fieldset>
                                                <legend>Datos del Padre</legend>
                                                <div class="form-group">
                                                    <label>Nombre Padre *</label>
                                                    <input class="form-control" id="nombre_padre" name="nombre_padre" placeholder="Nombre del Padre" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido Padre *</label>
                                                    <input class="form-control" id="apellido_padre" name="apellido_padre" placeholder="Apellido del Padre" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>DNI</label>
                                                    <input class="form-control" id="dni" name="dni" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input class="form-control" type="email" id="email" name="email" placeholder="Email del Padre" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Teléfono *</label>
                                                    <input class="form-control" id="telefono" name="telefono" placeholder="Teléfono del Padre" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Relación *</label>
                                                    <input class="form-control" id="relacion" name="relacion" placeholder="Relación con el Alumno" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Sexo *</label>
                                                    <select class="form-control" id="sexo_padre" name="sexo_padre" required>
                                                        <option value="hombre">Hombre</option>
                                                        <option value="mujer">Mujer</option>
                                                    </select>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-default">Enviar</button>
                                            <button type="reset" class="btn btn-primary">Borrar Datos</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>

    </div>

    <script src="../../../public/js/jquery-1.10.2.js"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
    <script src="../../../public/js/jquery.metisMenu.js"></script>
    <script src="../../../public/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../../../public/js/morris/morris.js"></script>
    <script src="../../../public/js/custom.js"></script>
</body>

</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del alumno
    $nombre_alumno = test_input($_POST['nombre_alumno']);
    $apellido_alumno = test_input($_POST['apellido_alumno']);
    $f_nacimiento = test_input($_POST['f_nacimiento']);
    $sexo_alumno = test_input($_POST['sexo_alumno']);
    $alergias = test_input($_POST['alergias']);
    $comentarios = test_input($_POST['comentarios']);

    // Datos del padre
    $nombre_padre = test_input($_POST['nombre_padre']);
    $apellido_padre = test_input($_POST['apellido_padre']);
    $email = test_input($_POST['email']);
    $telefono = test_input($_POST['telefono']);
    $relacion = test_input($_POST['relacion']);
    $sexo_padre = test_input($_POST['sexo_padre']);
    $dni = test_input($_POST['dni']);

    $curso = test_input($_POST['curso']);


    $seguir = true;

    if (emailExists($email)) {
        $seguir = false;
    }

    if ($seguir) {
        $target_dir = "../../../media/avatar/alumno/"; // Carpeta de destino
        $nombre_foto = trim($nombre_alumno) . "_" . trim($apellido_alumno);
        // Obtener la extensión del archivo subido
        $extension = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

        // Combinar el nombre base con ambas extensiones
        $target_file_jpg = $target_dir . $nombre_foto . ".jpg";
        $target_file_png = $target_dir . $nombre_foto . ".png";

        // Mover la foto a la carpeta de destino con la nueva extensión
        if ($extension == "jpg" || $extension == "jpeg") {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file_jpg)) {
                echo "La foto ha sido subida con éxito.";
                $nombre_foto_extension = $nombre_foto . ".jpg";
                echo '4';
            } else {
                echo "Lo siento, hubo un error al subir la foto.";
                $seguir = false;
            }
        } elseif ($extension == "png") {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file_png)) {
                echo "La foto ha sido subida con éxito.";
                $nombre_foto_extension = $nombre_foto . ".png";
            } else {
                echo "Lo siento, hubo un error al subir la foto.";
                $seguir = false;
            }
        } else {
            echo "Formato de imagen no compatible. Solo se admiten archivos JPG o PNG.";
            $seguir = false;
        }
    }
    if ($seguir) {
        $password = crearPassword($email, $dni);
        $id_user = crearUser($password, $email);
        $id_alumno = crearAlumno($nombre_alumno, $apellido_alumno, $f_nacimiento, $sexo_alumno, $alergias, $nombre_foto_extension, $comentarios);
        crearPadre($id_user, $nombre_padre, $apellido_padre, $email, $telefono, $relacion, $sexo_padre, $dni, $id_alumno);
        inscribirEstudianteEnClase($curso, $id_alumno);
        //echo "<script>window.location.href = '../../controllers/controllers_admin/admin_listar_alumnos_c.php';</script>";

    }
}
?>