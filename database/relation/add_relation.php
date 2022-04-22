<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddRelation'])) {

    $nama_rel               = $_POST['nama_rel'];
    $jenis_rel              = $_POST['jenis_rel'];
    $alamat_rel             = $_POST['alamat_rel'];
    $status                 = "ENABLED";

    $conn->query("INSERT INTO `po_relation` (
        `id_rel`, 
        `nama_rel`, 
        `jenis_rel`,
        `alamat_rel`,
        `status_rel`
        ) VALUES (
            '', 
            '" . $nama_rel . "', 
            '" . $jenis_rel . "',
            '" . $alamat_rel . "',
            '" . $status . "'
            );");
    header('location:../../pages/screen/our_relation.php?id=901001');
}
