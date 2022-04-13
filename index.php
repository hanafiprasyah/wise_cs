<?php

// Encrypt 
$origin     = "Dashboard";
$chiper     = "AES-128-CTR";
$iv_length  = openssl_cipher_iv_length($chiper);
$opt        = 0;
$enc_iv     = '1234567891011121';
$enc_key    = "wisecs";
$enc_string = openssl_encrypt($origin, $chiper, $enc_key, $opt, $enc_iv);

session_start();

include('./database/configures/koneksi.php');
include('./database/configures/check_token.php');

if (empty($_SESSION['username'])) {
  header("Location: pages/screen/login.php");
} else {
  header("Location: pages/screen/dashboard.php?id=" . $enc_string);
}
