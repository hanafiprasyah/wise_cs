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
    $downEaVal  = $eaVal / 2;

    $cVal   = 16.66666666666667 * 3;
    $downCVal   = $cVal - $coVal;

    $tVal   = 16.66666666666667 * 4;
    $downTVal   = $tVal - $coVal;

    $lpVal  = 16.66666666666667 * 5;
    $downLpVal  = $lpVal - $coVal;

    $dVal   = 16.66666666666667 * 6;
    $downDVal   = $dVal - $coVal;

    $stat   = $cs;
    $val    = $stat;

    switch ($val) {
        case "ENGINE ASSEMBLY":
            echo $val = $downEaVal;
            break;
        case "CABLING":
            echo $val = $downCVal;
            break;
        case "TESTING":
            echo $val = $downTVal;
            break;
        case "LABELING AND PACKAGING":
            echo $val = $downLpVal;
            break;
    }

    switch ($stat) {
        case "ENGINE ASSEMBLY":
            echo $stat =  'CASING ORDER';
            break;
        case "CABLING":
            echo $stat =  'ENGINE ASSEMBLY';
            break;
        case "TESTING":
            echo $stat =  'CABLING';
            break;
        case "LABELING AND PACKAGING":
            echo $stat =  'TESTING';
            break;
    }

    $conn->query("INSERT INTO `po_track`
    (`id_track_principal`, `po_number`, `id_user`) 
    VALUES ('','" . $po . "','" . $by . "')");

    $conn->query("UPDATE `purchase_order` SET 
    `progress`='" . $val . "',
    `detail_progress`='" . $stat . "' WHERE po_number='" . $po . "'");

    header('location:../../pages/screen/po_progress.php?id='.$po);
    mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
}
