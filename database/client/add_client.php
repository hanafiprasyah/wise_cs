<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddClient'])) {

    $id_client              = $_POST['id_client'];
    $nama_customer          = $_POST['nama_customer'];
    $alamat_customer        = $_POST['alamat_customer'];

    $conn->query("INSERT INTO `client` (
        `id_client`, 
        `nama_customer`, 
        `alamat_customer`
        ) VALUES (
            '" . $id_client . "', 
            '" . $nama_customer . "', 
            '" . $alamat_customer . "'
            );");
    header('location:../../pages/screen/our_client.php?id=102001');
}
