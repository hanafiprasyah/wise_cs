<?php
require_once '../configures/koneksi.php';

if (isset($_POST['btnUpdateProgressPrincipal'])) {
    date_default_timezone_set("Asia/Bangkok");

    $id_po = $_GET['id'];
    $update_by = $_GET['by'];
    $curstat = $_GET['cs'];

    $po = mysqli_real_escape_string($conn, $id_po);
    $by = mysqli_real_escape_string($conn, $update_by);
    $cs = mysqli_real_escape_string($conn, $curstat);

    // echo urldecode($cs);
    // echo $by;
    // echo $po;

    // Stat rank
    // #1 -> CASING ORDER val 16.6667
    // #2 -> ENGINE ASSEMBLY val 16.66667
    // #3 -> CABLING val 16.6667
    // #4 -> TESTING ORDER val 16.66667
    // #5 -> LABELING AND PACKAGING val 16.6667
    // #6 -> DELIVERY val 16.6667

    $coVal  = 16.66666666666667;
    $eaVal  = 16.66666666666667 * 2;
    $cVal   = 16.66666666666667 * 3;
    $tVal   = 16.66666666666667 * 4;
    $lpVal  = 16.66666666666667 * 5;
    $dVal   = 16.66666666666667 * 6;

    $stat   = $cs;
    $val    = $stat;

    switch ($val) {
        case "CASING ORDER":
            echo $val = $eaVal;
            break;
        case "ENGINE ASSEMBLY":
            echo $val = $cVal;
            break;
        case "CABLING":
            echo $val = $tVal;
            break;
        case "TESTING":
            echo $val = $lpVal;
            break;
        case "LABELING AND PACKAGING":
            echo $val = $dVal;
            break;
        case "DELIVERY":
            echo $val = $dVal;
            break;
    }

    switch ($stat) {
        case "CASING ORDER":
            echo $stat = 'ENGINE ASSEMBLY';
            break;
        case "ENGINE ASSEMBLY":
            echo $stat =  'CABLING';
            break;
        case "CABLING":
            echo $stat =  'TESTING';
            break;
        case "TESTING":
            echo $stat =  'LABELING AND PACKAGING';
            break;
        case "LABELING AND PACKAGING":
            echo $stat =  'DELIVERY';
            break;
        case "DELIVERY":
            echo $stat =  'RECEIVED';
            break;
    }

    $conn->query("INSERT INTO `po_track`
    (`id_track_principal`, `po_number`, `id_user`, `cur_stat`) 
    VALUES ('','" . $po . "','" . $by . "', '" . $cs . "')");

    $conn->query("UPDATE `purchase_order` SET 
    `progress`='" . $val . "',
    `detail_progress`='" . $stat . "' WHERE po_number='" . $po . "'");

    header('location:../../pages/screen/po_progress.php?id='.$po);
    mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
}
