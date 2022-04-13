<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddSurvey'])) {
    date_default_timezone_set("Asia/Bangkok");

    $year   = date("Y");
    $month  = date("m");
    $second = date("s");
    $millisecond = round(microtime(true) * 1000);

    $wise_pic           = $_POST['id_survey'];
    $newPic             = str_replace(" ", "", $wise_pic);
    $id_survey          = '' . $year . '' . $month . '' . $newPic . '' . $second . '' . $millisecond;

    $id_presentation         = $_POST['id_presentation'];
    $survey_pic              = $_POST['survey_pic'];
    $notel_survey            = $_POST['notel_survey'];
    $tech_team               = $_POST['tech_team'];
    $survey_date             = $_POST['survey_date'];
    $survey_location         = $_POST['survey_location'];
    $status                  = 'Not Yet';

    // Check if data exists
    $checkData      = $conn->query("SELECT id_presentation FROM `survey` WHERE id_presentation='" . $id_presentation . "';");
    $dataExists     = mysqli_num_rows($checkData);
    if ($dataExists === 1) {
        header("Location: ../../pages/screen/survey.php?id=405004&error=Data exists!");
        exit();
    } else {

        $conn->query("INSERT INTO `survey`(
            `id_survey`,
            `id_presentation`,
            `survey_pic`,
            `notel_survey`, 
            `tech_team`, 
            `survey_date`,
            `survey_location`,
            `survey_status`) VALUES (
                '" . $id_survey . "',
                '" . $id_presentation . "',                
                '" . $survey_pic . "',
                '" . $notel_survey . "',
                '" . $tech_team . "',
                '" . $survey_date . "',
                '" . $survey_location . "',
                '" . $status . "'
            );");

        $conn->query("UPDATE `activity_tracker` SET 
        `id_survey`='" . $id_survey . "',
        `survey_submit`='" . $survey_date . "' 
        WHERE id_presentation='" . $id_presentation . "';");

        header('location:../../pages/screen/survey.php?id=405004');
        mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
    }
}
