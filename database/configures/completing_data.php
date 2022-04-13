<?php
include "koneksi.php";

$id = $_POST['id_user'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$moto_hidup = $_POST['moto_hidup'];

// Encrypt 
$origin1        = "Dashboard";
$chiper         = "AES-128-CTR";
$iv_length      = openssl_cipher_iv_length($chiper);
$opt            = 0;
$enc_iv         = '1234567891011121';
$enc_key        = "wisecs";
$enc_string1    = openssl_encrypt($origin1, $chiper, $enc_key, $opt, $enc_iv);

if (isset($_POST['btnCompleting'])) {
    $sql = "UPDATE user SET 
                email='$email',
                alamat='$alamat',
                moto_hidup='$moto_hidup'
                WHERE id_user='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../../pages/screen/dashboard.php?id=" . $enc_string1);
        exit();
    } else {
        exit();
    }
} else {
    exit();
}
