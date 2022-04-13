<?php
require_once '../configures/koneksi.php';
$id_project = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_project);
$remove = "DELETE FROM `project` WHERE id_project = '" . $id_url . "';";
$sql = mysqli_query($conn, $remove);
header("Location: ../../pages/screen/our_project.php?id=101001");
