<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddReq'])) {

    date_default_timezone_set("Asia/Bangkok");

    $checkDataReq           = $conn->query("SELECT id_mainreq FROM `maintenance_req` ORDER BY id_mainreq DESC LIMIT 1;"); //getLastRow
    $rowDataReq             = mysqli_fetch_array($checkDataReq);
    $dataQueueReq           = $rowDataReq['id_mainreq'];

    $current_year           = date("Y"); //awalan input tiket main_request
    $current_month          = date("m"); //kedua input tiket main_request
    $second_string          = ($dataQueueReq + 1);

    $tiket_req              = '' . $current_year . '' . $current_month . '00' . $second_string;
    $id_client              = $_POST['id_client'];
    $id_project             = $_POST['id_project'];
    $id_user                = $_POST['id_user'];
    $reported_by               = $_POST['reported_by'];
    $req_date               = $_POST['req_date'];
    $tech_description       = $_POST['tech_description'];
    $status_req             = $_POST['status_req'];

    $conn->query("INSERT INTO `maintenance_req` (
        `id_mainreq`,
        `tiket_request`,
        `id_client`, 
        `id_project`, 
        `id_user`, 
        `reported_by`,
        `req_date`, 
        `tech_description`,
        `status_req`
        ) VALUES (
            '',
            '" . $tiket_req . "',
            '" . $id_client . "', 
            '" . $id_project . "', 
            '" . $id_user . "', 
            '" . $reported_by . "', 
            '" . $req_date . "',
            '" . $tech_description . "',
            '" . $status_req . "'
            );");
    header('location:../../pages/screen/main_req.php?id=105001');
}
