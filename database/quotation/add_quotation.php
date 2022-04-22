<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddQuotation'])) {
    date_default_timezone_set("Asia/Bangkok");

    $year   = date("Y");
    $month  = date("m");
    $second = date("s");
    $millisecond = round(microtime(true) * 1000);

    $entry_by = $_GET['entry_by'];
    $id_url = mysqli_real_escape_string($conn, $entry_by);

    // $quotation_ticket       = $_POST['id_quotation'];
    $id_quotation           = '' . $year . '' . $month . '' . $id_url . '' . $second . '' . $millisecond;

    $id_user            = $_POST['id_user'];
    $id_report          = $_POST['id_report'];
    $quotation_date     = $_POST['quotation_date'];
    $price              = $_POST['price'];
    $value              = preg_replace("/[^0-9]/", "", $price);
    $quotation_status   = 'Delayed';

    // Check if data exists
    $checkData      = $conn->query("SELECT id_quotation FROM `quotation` WHERE id_quotation='" . $id_quotation . "';");
    $dataExists     = mysqli_num_rows($checkData);
    if ($dataExists === 1) {
        header("Location: ../../pages/screen/quotation.php?id=405006&error=Data exists!");
        exit();
    } else {
        $conn->query("INSERT INTO `quotation`(
            `id_quotation`, 
            `nama_lengkap`, 
            `id_report`,
            `quotation_date`,
            `price`, 
            `value`,
            `quotation_status`) VALUES (
                '" . $id_quotation . "',
                '" . $id_user . "',
                '" . $id_report . "',
                '" . $quotation_date . "',
                '" . $price . "',
                '" . $value . "',
                '" . $quotation_status . "');");

        $conn->query("UPDATE `activity_tracker` SET 
                `id_quotation`='" . $id_quotation . "',
                `quotation_submit`='" . $quotation_date . "' 
                WHERE id_report='" . $id_report . "';");

        header('location:../../pages/screen/quotation.php?id=405006');
        mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
    }

    // echo "<script>window.close();</script>";
}
