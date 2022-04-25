<?php
require_once '../configures/koneksi.php';

$id_po = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_po);

if (isset($_POST['btnWFD'])) {
    $conn->query("UPDATE `purchase_order` SET `po_status`='Waiting for DP' WHERE po_number='" . $id_url . "';");
    header('location:../../pages/screen/purchase_order.php?id=405007');
}
