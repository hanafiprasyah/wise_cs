<?php
session_set_cookie_params(0);
session_start();

include('../../database/configures/koneksi.php');
include('../../database/configures/check_token.php');

if (empty($_SESSION['username'])) {
    header("Location: ./login.php");
}

// require_once '../../database/configures/koneksi.php';
//Get project ID
$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);
$sql = "SELECT 
                            A.*,
                            B.tipe_produk,
                            C.nama_customer
                            FROM project A 
                            INNER JOIN product B 
                            USING (id_product) 
                            INNER JOIN client C 
                            USING (id_client)
                            WHERE id_project='" . $id_url . "';";
$resultID = mysqli_query($conn, $sql);
$rowDatas = mysqli_fetch_array($resultID);
//Get User Data
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
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../../plugins/fullcalendar/main.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Icon -->
    <link rel="icon" href="../../dist/img/thunder.png">
    <!-- ===================================================================== -->
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <!-- ALL CONTENTS HERE -->
    <div class="wrapper">

        <?php include("../layout/preloader/wobble_preloader.php"); ?>

        <?php include("../layout/navbar.php"); ?>

        <?php include("../layout/sidebar.php"); ?>

        <?php include('../content/projectEdit_content.php'); ?>

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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- Moments -->
    <script src="../../plugins/moment/moment-with-locales.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Addons Scripts -->
    <script type="text/javascript">
        <?php include('../scripts/spesific/date_selector.js'); ?>
        <?php include('../scripts/spesific/sign_out.js'); ?>
    </script>
</body>

</html>