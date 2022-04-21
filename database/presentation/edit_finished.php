<?php
require_once '../configures/koneksi.php';

$id_presentation = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_presentation);

if (isset($_POST['btnFinishedPresent'])) {

    $conn->query("UPDATE `presentation` SET `presentation_status`='Finished' WHERE id_presentation='" . $id_url . "';");
    header('location:../../pages/screen/presentation.php?id=405003');
}
