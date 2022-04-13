<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

if (isset($_POST['btnStopWarranty'])) {

    date_default_timezone_set("Asia/Bangkok");
    $status        = 'Stopped';

    $conn->query("UPDATE `project` SET 
    `exp_status`='" . $status . "' 
    WHERE id_project='" . $id_url . "';");
    header('location:../../pages/screen/warranty_detail.php?id=105004');
}
