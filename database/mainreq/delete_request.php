<?php
require_once '../configures/koneksi.php';
$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);
$remove = "DELETE FROM `maintenance_req` WHERE id_mainreq = '" . $id_url . "';";
$sql = mysqli_query($conn, $remove);
header("Location: ../../pages/screen/main_req.php?id=105001");
