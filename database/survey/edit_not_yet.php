<?php
require_once '../configures/koneksi.php';

$id_survey = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_survey);
$month = date("m");

if (isset($_POST['btnNotYetSurvey'])) {

    $conn->query("UPDATE `survey` SET `survey_status`='Not Yet' WHERE id_survey='" . $id_url . "';");
    header('location:../../pages/screen/survey.php?id=405004');
}
