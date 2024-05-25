
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
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que quieres crear este usuario?");
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
                                <a href="../../views/views_admin/admin_listar_clase_v.php">Ver</a>
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
                                <a href="../../views/views_admin/admin_listar_alumnos_v.php">Ver</a>
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
                                <a href="../../views/views_admin/admin_listar_contacto_v.php">Ver</a>
                            </li>
                            <li>
                                <a href="../../controllers/controllers_admin/admin_crear_contacto_c.php">Crear</a>
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
                        <h2>Educadores</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Educadores
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>DNI</th>
                                            <th>E-mail</th>
                                            <th>Teléfono</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Sexo</th>
                                            <th>Editar</th>
                                            <th href='../../../media/avatar/educador/Brad_Pitt.jpg'>Eliminar</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($educadores): ?>
                                            <?php foreach ($educadores as $educador): ?>
                                                <tr>
                                                    <td class="img-td"><img src="<?= '../../../media/avatar/educador/' . $educador['img'] ?>" alt="Foto" class="img-responsive" /></td>
                                                    <td><?= $educador['nombre'] ?></td>
                                                    <td><?= $educador['apellido'] ?></td>
                                                    <td><?= $educador['DNI'] ?></td>
                                                    <td><?= $educador['email'] ?></td>
                                                    <td><?= $educador['tel'] ?></td>
                                                    <td><?= $educador['f_nacimiento'] ?></td>
                                                    <td><?= $educador['sexo'] ?></td>
                                                    <td><a href="../../controllers/controllers_admin/admin_editar_educador_c.php?id=<?= $educador['id'] ?>">Editar</a></td>
                                                    <td><a href="../../controllers/controllers_admin/admin_listar_educadores_c.php?action=delete&id=<?= $educador['id'] ?>" onclick="return confirmarEliminacion();">Eliminar</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10">No hay educadores disponibles.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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