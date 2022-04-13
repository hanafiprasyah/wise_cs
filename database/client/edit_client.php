<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

if (isset($_POST['btnEditClient'])) {

    date_default_timezone_set("Asia/Bangkok");

    $id_client               = $_POST['id_client'];
    $nama_client             = $_POST['nama_client'];
    $alamat_customer         = $_POST['alamat_customer'];

    $conn->query("UPDATE `client` SET 
    `id_client`='" . $id_client . "',
    `nama_customer`='" . $nama_client . "', 
    `alamat_customer`='" . $alamat_customer . "'
    WHERE id_client='" . $id_url . "';");
    header('location:../../pages/screen/client_detail.php?id=' . $id_url . '');
}
