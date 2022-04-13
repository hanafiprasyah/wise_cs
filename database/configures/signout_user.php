<?php
session_start();
require_once 'koneksi.php';

$session_id = $_GET['session_id'];
$id_sess    = mysqli_real_escape_string($conn, $session_id);

$id_user    = $_GET['id_user'];
$id_us      = mysqli_real_escape_string($conn, $id_user);

date_default_timezone_set('Asia/Jakarta');
$ldate = date('Y-m-d H:i:s', time());

$conn->query("UPDATE `login_session` SET `logout`='$ldate' WHERE id_session = '" . $id_sess . "' ORDER BY id_session DESC LIMIT 1;");
$conn->query("UPDATE `user` SET `login_status`='Offline' WHERE id_user='" . $id_us . "';");

header('location:../../pages/screen/session_monitoring.php?id=2022YYtmPswSession');
exit();
