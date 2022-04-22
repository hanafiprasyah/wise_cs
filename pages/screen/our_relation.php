<?php
session_set_cookie_params(0);
session_start();

include('../../database/configures/koneksi.php');
include('../../database/configures/check_token.php');

if (empty($_SESSION['username'])) {
    header("Location: ./login.php");
}

// require_once '../../database/configures/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='" . $_SESSION['id_user'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wibawa Solusi Elektrik</title>

    <!-- ===================================================================== -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Icon -->
    <link rel="icon" href="../../dist/img/thunder.png">
    <!-- ===================================================================== -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- ALL CONTENTS HERE -->
    <div class="wrapper">

        <?php include("../layout/preloader/wobble_preloader.php") ?>

        <?php include("../layout/navbar.php"); ?>

        <?php include("../layout/sidebar.php"); ?>

        <?php include('../content/relation_content.php'); ?>

        <?php include('../layout/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery Mapael -->
    <script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Addons Scripts -->
    <script type="text/javascript">
        <?php include('../scripts/spesific/print_function.js'); ?>
        <?php include('../scripts/spesific/sign_out.js'); ?>
        <?php include('../scripts/spesific/table_form.js'); ?>
    </script>
</body>

</html>