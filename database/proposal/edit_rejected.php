<?php
require_once '../configures/koneksi.php';

$id_proposal = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_proposal);
$month = date("m");

if (isset($_POST['btnRejectedProposal'])) {

    $conn->query("UPDATE `proposal` SET `proposal_status`='Rejected' WHERE id_proposal='" . $id_url . "';");
    header('location:../../pages/screen/proposal.php?id=405002');
}
