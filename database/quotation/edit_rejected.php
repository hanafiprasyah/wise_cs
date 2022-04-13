<?php
require_once '../configures/koneksi.php';

$id_quotation = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_quotation);
$month = date("m");

if (isset($_POST['btnRejected'])) {
    $conn->query("UPDATE `quotation` SET `quotation_status`='Rejected' WHERE id_quotation='" . $id_url . "';");
    header('location:../../pages/screen/quotation.php?id=405006');
}
