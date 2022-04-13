<?php
require_once '../configures/koneksi.php';
if (isset($_POST['btnAddQuotes'])) {

    date_default_timezone_set("Asia/Bangkok");

    $id_user = $_GET['id'];
    $id_url = mysqli_real_escape_string($conn, $id_user);

    $quotes_text            = $_POST['quotes_text'];
    $trimDeployDate         = date("Y-m-d");
    $status                 = 'Hide';

    $conn->query("INSERT INTO `quotes` (
        `id_quotes`, 
        `id_user`, 
        `quotes`, 
        `quote_created`, 
        `quotes_status`
        ) VALUES (
            '', 
            '" . $id_url . "', 
            '" . $quotes_text . "', 
            '" . $trimDeployDate . "', 
            '" . $status . "'
            );");
    header('location:../../pages/screen/quotes.php?id=601101');
}
