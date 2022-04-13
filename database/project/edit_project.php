<?php
require_once '../configures/koneksi.php';

$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);

if (isset($_POST['btnEditProject'])) {

    //getDefaultDate(ASIA/BANGKOK)
    // $currentDate = date("Y/m/d");
    // $allData = "SELECT * FROM project";
    // $connecting = mysqli_query($conn,$allData);
    // $rowDataTRIM = mysqli_fetch_array($connecting);
    // $ourDate = $rowDataTRIM['tgl_pemasangan'];
    // $trimDate = date("Y/m/d", strtotime($ourDate."+6 months"));
    // $searchData = "SELECT * FROM project WHERE visit_schedule='$currentDate'";
    // $connecting = mysqli_query($conn, $searchData);
    // $rowScheduled = mysqli_num_rows($connecting);
    // echo "<h3>" . $rowScheduled . "</h3>";

    date_default_timezone_set("Asia/Bangkok");

    $id_project             = $_POST['id_project'];
    $id_client              = $_POST['id_client'];
    $id_product             = $_POST['id_product'];
    $sn                     = $_POST['serial_number'];
    $jumlah_pesanan         = $_POST['jumlah_pesanan'];
    $satuan                 = $_POST['satuan'];
    $lokasi_pemasangan      = $_POST['lokasi_pemasangan'];
    $tgl_pemasangan         = $_POST['tgl_pemasangan'];
    $visit_schedule         = $_POST['visit_schedule'];
    $exp_guarantee          = $_POST['exp_guarantee'];
    $deskripsi              = $_POST['deskripsi'];
    $pic                    = $_POST['pic'];
    $notel                  = $_POST['notel'];

    $trimVisitDate  = date("Y/m/d", strtotime($tgl_pemasangan . "+6 months"));
    $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+12 months"));

    $conn->query("UPDATE `project` SET 
    `id_project`='" . $id_project . "', 
    `id_client`='" . $id_client . "',
    `id_product`='" . $id_product . "',
    `sn`='" . $sn . "',
    `jumlah_pesanan`='" . $jumlah_pesanan . "',
    `satuan`='" . $satuan . "',
    `lokasi_pemasangan`='" . $lokasi_pemasangan . "',
    `tgl_pemasangan`='" . $tgl_pemasangan . "',
    `visit_schedule`='" . $trimVisitDate . "',
    `exp_guarantee`='" . $trimExpDate . "',
    `deskripsi`='" . $deskripsi . "',
    `pic`='" . $pic . "',
    `notel`='" . $notel . "'
    WHERE id_project='" . $id_url . "';");
    header('location:../../pages/screen/project_detail.php?id=' . $id_url . '');
}
