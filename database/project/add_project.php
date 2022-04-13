<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddProject'])) {

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
    $pilihan_garansi        = $_POST['garansi'];
    $frekuensi              = $_POST['frekuensi'];

    $visiting_status        = 'Waiting for confirm';
    $exp_status             = 'Continues';

    if ($frekuensi == '3 months') {
        $trimVisitDate  = date("Y/m/d", strtotime($tgl_pemasangan . "+3 months"));
    } else if ($frekuensi == '6 months') {
        $trimVisitDate  = date("Y/m/d", strtotime($tgl_pemasangan . "+6 months"));
    } else if ($frekuensi == 'novisiting') {
        $trimVisitDate  = '';
    } else {
        echo 'error input visit date';
    }

    if ($pilihan_garansi == '1') {
        $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+12 months"));
        $exp_value      = '12 months';
    } else if ($pilihan_garansi == '2') {
        $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+24 months"));
        $exp_value      = '24 months';
    } else if ($pilihan_garansi == '3') {
        $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+36 months"));
        $exp_value      = '36 months';
    } else if ($pilihan_garansi == '4') {
        $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+48 months"));
        $exp_value      = '48 months';
    } else if ($pilihan_garansi == '5') {
        $trimExpDate    = date("Y/m/d", strtotime($tgl_pemasangan . "+60 months"));
        $exp_value      = '60 months';
    } else {
        echo 'error input warranty date';
    }

    $conn->query("INSERT INTO `project` (
        `id_project`, 
        `id_client`, 
        `id_product`, 
        `sn`, 
        `jumlah_pesanan`, 
        `satuan`, 
        `lokasi_pemasangan`, 
        `tgl_pemasangan`, 
        `visit_schedule`,
        `frekuensi`,
        `exp_value`,
        `exp_guarantee`, 
        `deskripsi`,
        `pic`,
        `notel`,
        `visiting_status`,
        `exp_status`
        ) VALUES (
            '" . $id_project . "', 
            '" . $id_client . "', 
            '" . $id_product . "', 
            '" . $sn . "', 
            '" . $jumlah_pesanan . "',
            '" . $satuan . "',
            '" . $lokasi_pemasangan . "',
            '" . $tgl_pemasangan . "',
            '" . $trimVisitDate . "',
            '" . $frekuensi . "',
            '" . $exp_value . "',
            '" . $trimExpDate . "',
            '" . $deskripsi . "',
            '" . $pic . "',
            '" . $notel . "',
            '" . $visiting_status . "',
            '" . $exp_status . "'
            );");
    header('location:../../pages/screen/our_project.php?id=101001');
}
