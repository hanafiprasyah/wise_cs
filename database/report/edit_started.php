<?php
require_once '../configures/koneksi.php';

$id_report = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_report);
$month = date("m");

if (isset($_POST['btnStartedRep'])) {
    $conn->query("UPDATE `report` SET `report_status`='Just Started' WHERE id_report='" . $id_url . "';");
    header('location:../../pages/screen/report.php?id=405005');
}
