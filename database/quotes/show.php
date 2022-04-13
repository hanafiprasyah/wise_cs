<?php
require_once '../configures/koneksi.php';

$id_quotes = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_quotes);
$month = date("m");

if (isset($_POST['btnShowQuotes'])) {

    $conn->query("UPDATE `quotes` SET `quotes_status`='Show' WHERE id_quotes='" . $id_url . "';");
    header('location:../../pages/screen/quotes.php?id=601101');
}
