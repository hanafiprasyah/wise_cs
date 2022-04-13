<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

if (isset($_POST['btnNextSchedule'])) {

    date_default_timezone_set("Asia/Bangkok");
    $id_project             = $_POST['id_project'];

    $getDataFrekuensi       = $conn->query("SELECT * FROM project WHERE id_project='" . $id_url . "'");
    $getArray               = mysqli_fetch_array($getDataFrekuensi);
    $frekuensi              = $getArray['frekuensi'];
    $visit_schedule         = $getArray['visit_schedule'];
    $exp_warranty           = $getArray['exp_guarantee'];

    $date1 = strtotime($visit_schedule);
    $date2 = strtotime($exp_warranty);
    // $remaining = $date - time();
    $remaining = $date1 - $date2;
    $dayremaining = floor($remaining / -86400);
    // echo $dayremaining;

    if ($dayremaining <= 90) {
        $new_status = 'No visiting';
    } else {
        $new_status = 'Waiting for schedule';
    }

    // echo $frekuensi;  

    $trimNewVisitDate  = date("Y-m-d", strtotime($visit_schedule . $frekuensi));
    // $trimVisitDate  = date("Y/m/d", strtotime($tgl_pemasangan . "+6 months"));

    $conn->query("UPDATE `project` SET 
    `visit_schedule`='" . $trimNewVisitDate . "',
    `visiting_status`='" . $new_status . "'
    WHERE id_project='" . $id_url . "';");
    header('location:../../pages/screen/project_detail.php?id=' . $id_url . '');
}
