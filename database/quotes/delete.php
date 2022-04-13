<?php
require_once '../configures/koneksi.php';
$id_quotes = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_quotes);

$remove = "DELETE FROM `quotes` WHERE id_quotes = '" . $id_url . "';";

$sql = mysqli_query($conn, $remove);

header("Location: ../../pages/screen/quotes.php?id=601101");
