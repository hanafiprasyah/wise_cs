<?php

include '../configures/koneksi.php';

// Encrypt 
$origin2        = "SessionMonitoring";
$chiper         = "AES-128-CTR";
$iv_length      = openssl_cipher_iv_length($chiper);
$opt            = 0;
$enc_iv         = '1234567891011121';
$enc_key        = "wisecs";
$enc_string2    = openssl_encrypt($origin2, $chiper, $enc_key, $opt, $enc_iv);

$conn->query('DELETE FROM `login_session`');
mysqli_close($conn);
header("location: ../../pages/screen/session_monitoring.php?id=" . $enc_string2);
