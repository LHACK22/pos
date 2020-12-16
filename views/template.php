<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Inventory System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PLUGINS DE CSS -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/dist/css/adminlte.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- CSS SWEET ALERT -->

    <link rel="stylesheet" href="views/plugins/sweetalert2/dist/sweetalert2.min.css">


    <!-- PLUGINS DE JAVASCRIPT -->

    <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="views/dist/js/demo.js"></script>

    <!-- DataTables -->
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- script SWEET ALERT -->
    <script src="views/plugins/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="views/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>


</head>


<!-- CUERPO DEL DOCUMENTO -->

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <?php

    if (isset($_SESSION["iniciarSeccion"]) && $_SESSION["iniciarSeccion"] == "ok") {


        echo '<div class="wrapper">';
        // CABEZERA
        include "modules/header.php";

        // MENU LATERAL
        include "modules/sidebar.php";

        // CONTENIDO

        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "home" || $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "categorias" || $_GET["ruta"] == "productos" ||
                $_GET["ruta"] == "clientes" || $_GET["ruta"] == "pagina-ventas" ||
                $_GET["ruta"] == "crear-ventas" || $_GET["ruta"] == "reporte-ventas" ||
                $_GET["ruta"] == "logout"
            ) {
                include "modules/" . $_GET["ruta"] . ".php";
            } else {
                include "modules/404.php";
            }
        } else {
            include "modules/home.php";
        }


        // PIE DE PAGINA
        include "modules/footer.php";

        echo '</div>';
    } else {
        include "modules/login.php";
    }

    ?>



    <!-- My Scripr -->
    <script src="views/js/template.js"></script>
    <script src="views/js/usuarios.js"></script>

</body>

</html>