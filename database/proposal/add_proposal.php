<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddProposal'])) {
    date_default_timezone_set("Asia/Bangkok");

    $year   = date("Y");
    $month  = date("m");
    $second = date("s");
    $millisecond = round(microtime(true) * 1000);

    $proposal_ticket        = $_POST['id_proposal'];
    $id_proposal            = '' . $year . '' . $month . '' . $proposal_ticket . '' . $second . '' . $millisecond;

    $proposal_title         = $_POST['proposal_title'];
    $target_client          = $_POST['target_client'];
    $submit_date            = $_POST['submit_date'];
    $proposal_status        = 'Just Sending';

    // INSERT NEW DATA INTO PROPOSAL TABLE
    $conn->query("INSERT INTO `proposal`(
        `id_proposal`, 
        `proposal_title`, 
        `target_client`, 
        `submit_date`,
        `proposal_status`) VALUES (
            '" . $id_proposal . "',
            '" . $proposal_title . "',
            '" . $target_client . "',
            '" . $submit_date . "',
            '" . $proposal_status . "'
        );");

    $conn->query("INSERT INTO `activity_tracker`(
            `id_activity`,
            `id_proposal`, 
            `proposal_title`, 
            `proposal_submit`,
            `status`) VALUES (
                '',
                '" . $id_proposal . "',
                '" . $proposal_title . "',
                '" . $submit_date . "',
                'On Progress'
                );");
    // INSERT INTO `activity_tracker`(`id_activity`, `proposal_title`, `proposal_submit`, `status`) VALUES ('','Penawaran ETS RSUD Makassar','2022-03-01','In Progress');

    header('location:../../pages/screen/proposal.php?id=405002');
    mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
}
