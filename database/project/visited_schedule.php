<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

if (isset($_POST['btnVisited'])) {

    date_default_timezone_set("Asia/Bangkok");
    $status        = 'Visited';

    $conn->query("UPDATE `project` SET 
    `visiting_status`='" . $status . "' 
    WHERE id_project='" . $id_url . "';");
    header('location:../../pages/screen/scheduled_detail.php?id=105003');
}
