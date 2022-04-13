<?php
require_once '../configures/koneksi.php';

$id_mainreq = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_mainreq);

if (isset($_POST['btnUpdateTimeline'])) {

    $updated_by       = $_POST['updated_by'];
    $newStatus        = $_POST['status_req'];
    $tiket_request    = $_POST['tiket_request'];
    $timeline_desc    = $_POST['timeline_desc'];

    date_default_timezone_set("Asia/Bangkok");
    // $date             = date("Y-m-d");

    $conn->query("UPDATE `maintenance_req` SET `status_req`='" . $newStatus . "' WHERE id_mainreq = '" . $id_url . "';");
    // $queryUpdate = "UPDATE `maintenance_req` SET 
    // `id_mainreq`='[value-1]',
    // `tiket_request`='[value-2]',
    // `id_client`='[value-3]',
    // `id_project`='[value-4]',
    // `id_user`='[value-5]',
    // `reported_by`='[value-6]',
    // `req_date`='[value-7]',
    // `tech_description`='[value-8]',
    // `status_req`='[value-9]' 
    // WHERE id_mainreq='" . $id_url . "';";

    // $conn->query("INSERT INTO `maintenance_timeline`(`id_update`, `id_mainreq`, `updated_by`, `updating_date`, `status_update`) 
    // VALUES ('', '$id_url', '$updated_by', '$current_date' '$newStatus');");

    $sql = "INSERT INTO `maintenance_timeline`(
        `id_update`, 
        `id_mainreq`, 
        `updated_by`, 
        `updating_date`, 
        `status_update`, 
        `timeline_desc`) VALUES 
    (
        '',
        '" . $id_url . "',
        '" . $updated_by . "',
        now(),
        '" . $newStatus . "',
        '" . $timeline_desc . "'
    )";

    $conn->query($sql);

    header('location:../../pages/screen/mainReq_detail.php?id=' . $tiket_request);
}
