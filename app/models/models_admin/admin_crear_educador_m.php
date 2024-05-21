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
                        <img src="../../../public/img/administracion.png" class="user-image img-responsive"/>
                    </li>
                     
                    <li>
                        <a href="#"><img src="../../../public/img/salon-de-clases.png"> Clases<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Ver</a>
                            </li>
                            <li>
                                <a href="#">Crear</a>
                            </li>
                            <li>
                                <a href="#">Editar</a>
                            </li>
                            <li>
                                <a href="#">Eliminar</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><img src="../../../public/img/educador.png"> Profesores<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Ver</a>
                            </li>
                            <li>
                                <a href="./admin_crear_educador_v.php">Crear</a>
                            </li>
                            <li>
                                <a href="#">Editar</a>
                            </li>
                            <li>
                                <a href="#">Eliminar</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><img src="../../../public/img/ninos.png"> Alumnos<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Ver</a>
                            </li>
                            <li>
                                <a href="#">Crear</a>
                            </li>
                            <li>
                                <a href="#">Editar</a>
                            </li>
                            <li>
                                <a href="#">Eliminar</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><img src="../../../public/img/contactos.png"> Contactos<span class=" arrow"> <img src="../../../public/img/arrow.png"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Ver</a>
                            </li>
                            <li>
                                <a href="#">Crear</a>
                            </li>
                            <li>
                                <a href="#">Editar</a>
                            </li>
                            <li>
                                <a href="#">Eliminar</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>    
                </ul>
            </div>
        </nav>  
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Añadir Educador</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Datos Personales
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" id="nombre" name="nombre" />
                                            </div>
                                            <div class="form-group">
                                                <label>Apellidos</label>
                                                <input class="form-control" id="apellido" name="apellido"/>
                                            </div>

                                            <div class="form-group">
                                                <label>DNI</label>
                                                <input class="form-control" id="dni" name="dni"/>
                                            </div>

                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input class="form-control" type="tel" id="tel" name="tel"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Fecha Nacimiento</label>
                                                <input class="form-control" type="date" id="f_nac" name="f_nac"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Foto Perfil / Avatar</label>
                                                <input type="file" id="avatar" name="avatar"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Sexo</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="sexo" value="hombre" />Hombre
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="sexo" value="mujer" checked />Mujer
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-primary">Reset Button</button>

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
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $dni = htmlspecialchars($_POST['dni']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $f_nac = htmlspecialchars($_POST['f_nac']);
    $sexo = htmlspecialchars($_POST['sexo']);


    // Mostrar los datos recogidos
    echo "<h2>Datos recogidos del formulario:</h2>";
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellidos: " . $apellido . "<br>";
    echo "DNI: " . $dni . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Teléfono: " . $tel . "<br>";
    echo "Fecha de Nacimiento: " . $f_nac . "<br>";
    echo "Sexo: " . $sexo . "<br>";
    if (isset($avatar_destination)) {
        echo "Avatar: " . $avatar_destination . "<br>";
    }
}
?>
