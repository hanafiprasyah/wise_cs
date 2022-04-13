<?php
require_once '../configures/koneksi.php';

$id_presentation = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_presentation);
$month = date("m");

if (isset($_POST['btnNotYetPresent'])) {

    $conn->query("UPDATE `presentation` SET `presentation_status`='Not Yet' WHERE id_presentation='" . $id_url . "';");
    header('location:../../pages/screen/presentation.php?id=405003');
}
