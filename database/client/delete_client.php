<?php
require_once '../configures/koneksi.php';
$id_client = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_client);
$remove = "DELETE FROM `client` WHERE id_client = '" . $id_url . "';";
$sql = mysqli_query($conn, $remove);
header("Location: ../../pages/screen/our_client.php?id=102001");
