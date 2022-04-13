<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

$getLastExpDate = $conn->query("SELECT * FROM project WHERE id_project = '" . $id_url . "'");
$rowLastExpDate = mysqli_fetch_array($getLastExpDate);
$last_exp       = $rowLastExpDate['exp_guarantee'];

$selectAdding   = $_POST['tambah_garansi'];

if (isset($_POST['btnAddWarranty'])) {

    date_default_timezone_set("Asia/Bangkok");
    $status        = 'Continues';
    if ($selectAdding == '1') {
        $newExpDate = date("Y-m-d", strtotime($last_exp . "+12 months"));
        $exp_value      = '12 months';
    } else if ($selectAdding == '2') {
        $newExpDate = date("Y-m-d", strtotime($last_exp . "+24 months"));
        $exp_value      = '24 months';
    } else if ($selectAdding == '3') {
        $newExpDate = date("Y-m-d", strtotime($last_exp . "+36 months"));
        $exp_value      = '36 months';
    } else if ($selectAdding == '4') {
        $newExpDate = date("Y-m-d", strtotime($last_exp . "+48 months"));
        $exp_value      = '48 months';
    } else if ($selectAdding == '5') {
        $newExpDate = date("Y-m-d", strtotime($last_exp . "+60 months"));
        $exp_value      = '60 months';
    } else {
        echo 'error input warranty date';
    }

    $conn->query("UPDATE `project` SET 
    `exp_guarantee`='" . $newExpDate . "',
    `exp_value`='" . $exp_value . "',
    `exp_status`='" . $status . "' 
    WHERE id_project='" . $id_url . "';");
    header('location:../../pages/screen/project_detail.php?id="' . $id_url . '"');
}
