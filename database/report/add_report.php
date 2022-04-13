<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddReport'])) {
    date_default_timezone_set("Asia/Bangkok");

    $year   = date("Y");
    $month  = date("m");
    $second = date("s");
    $millisecond = round(microtime(true) * 1000);

    $reporter           = $_POST['id_report'];
    $newReporter        = str_replace(" ", "", $reporter);
    $id_report          = '' . $year . '' . $month . '' . $newReporter . '' . $second . '' . $millisecond;

    $id_survey         = $_POST['id_survey'];
    $report_title      = $_POST['report_title'];
    $report_created    = $_POST['report_created'];
    $id_user           = $_POST['id_user'];
    $report_status     = 'Delayed';

    // Check if data exists
    $checkData      = $conn->query("SELECT id_survey FROM `report` WHERE id_survey='" . $id_survey . "';");
    $dataExists     = mysqli_num_rows($checkData);
    if ($dataExists === 1) {
        header("Location: ../../pages/screen/report.php?id=405005&error=Data exists!");
        exit();
    } else {
        $conn->query("INSERT INTO `report`(
            `id_report`, 
            `id_survey`, 
            `report_title`,
            `report_created`,
            `id_user`, 
            `report_status`) VALUES (
                '" . $id_report . "',
                '" . $id_survey . "',
                '" . $report_title . "',
                '" . $report_created . "',
                '" . $id_user . "',
                '" . $report_status . "');");

        $conn->query("UPDATE `activity_tracker` SET 
        `id_report`='" . $id_report . "',
        `report_submit`='" . $report_created . "' 
        WHERE id_survey='" . $id_survey . "';");
        header('location:../../pages/screen/report.php?id=405005');
        mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
    }

    // echo "<script>window.close();</script>";
}
