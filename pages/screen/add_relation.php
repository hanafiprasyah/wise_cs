<?php
session_set_cookie_params(0);
session_start();

include('../../database/configures/koneksi.php');
include('../../database/configures/check_token.php');

if (empty($_SESSION['username'])) {
    header("Location: ./login.php");
}

// require_once '../../database/configures/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='" . $_SESSION['id_user'] . "';");
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
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Icon -->
    <link rel="icon" href="../../dist/img/thunder.png">
    <!-- ===================================================================== -->
</head>

<!-- oncopy="return false" oncut="return false" -->

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- ALL CONTENTS HERE -->
    <div class="wrapper">

        <?php include("../layout/preloader/wobble_preloader.php"); ?>

        <?php include("../layout/navbar.php"); ?>

        <?php include("../layout/sidebar.php"); ?>

        <?php include('../content/addRelation_content.php'); ?>

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
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Addons Scripts -->
    <script type="text/javascript">
        <?php include('../scripts/spesific/sign_out.js'); ?>
    </script>
</body>

</html>