<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddPresentation'])) {
    date_default_timezone_set("Asia/Bangkok");

    $year   = date("Y");
    $month  = date("m");
    $second = date("s");
    $millisecond = round(microtime(true) * 1000);


    $entry_by = $_GET['entry_by'];
    $id_url = mysqli_real_escape_string($conn, $entry_by);

    $presentator        = $_POST['id_presentation'];
    $newPresentator     = str_replace(" ", "", $presentator);
    $id_presentation    = '' . $year . '' . $month . '' . $newPresentator . '' . $id_url . '' . $second . '' . $millisecond;

    $id_proposal            = $_POST['id_proposal'];
    $client_name            = $_POST['client_name'];
    $presentation_date      = $_POST['presentation_date'];
    $presentation_name      = $_POST['presentation_name'];
    $status                 = 'Not Yet';

    // Check if data exists
    $checkData      = $conn->query("SELECT id_proposal FROM `presentation` WHERE id_proposal='" . $id_proposal . "'");
    $dataExists     = mysqli_num_rows($checkData);
    if ($dataExists === 1) {
        header("Location: ../../pages/screen/presentation.php?id=405003&error=Data exists!");
        exit();
    } else {
        $conn->query("INSERT INTO `presentation`(
            `id_presentation`, 
            `id_proposal`,
            `presentation_name`,
            `presentator`,  
            `presentation_date`,
            `presentation_status`
            ) VALUES (
                '" . $id_presentation . "',
                '" . $id_proposal . "',
                '" . $presentation_name . "',
                '" . $presentator . "',
                '" . $presentation_date . "',
                '" . $status . "'
            );");

        $conn->query("UPDATE `activity_tracker` SET 
        `id_presentation`='" . $id_presentation . "',
        `presentation_submit`='" . $presentation_date . "' 
        WHERE id_proposal='" . $id_proposal . "';");

        header('location:../../pages/screen/presentation.php?id=405003');
        mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
        // echo "<script>window.close();</script>";
    }
}
