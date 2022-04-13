<?php
session_start();
include('../configures/koneksi.php');

$conn->query(
    "UPDATE `user` SET `login_status`='Offline' WHERE id_user = '" . $_SESSION['id_user'] . "';"
);

date_default_timezone_set('Asia/Jakarta');
$ldate = date('Y-m-d H:i:s', time());
$conn->query(
    "UPDATE `login_session` SET `logout`='$ldate' WHERE id_user = '" . $_SESSION['id_user'] . "' ORDER BY id_session DESC LIMIT 1;"
);

// Delete token 
$id = mysqli_real_escape_string($conn, $_SESSION['id_user']);
mysqli_query($conn, "delete from login_token where id_user = '" . $id . "'");

session_unset();
session_destroy();

header("Location: ../../index.php");
exit();
