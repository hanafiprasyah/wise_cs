<?php
include "koneksi.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['btnUpdate'])) {

    $id = validate($_POST['id_user']);
    $username = validate($_POST['username']);
    $name = validate($_POST['nama_lengkap']);
    $email = validate($_POST['email']);
    $alamat = validate($_POST['alamat']);
    $moto_hidup = validate($_POST['moto_hidup']);
    $password = validate($_POST['password']);
    $level = validate($_POST['level']);

    // Encrypt 
    $string         = "UserProfile";
    $chiper         = "AES-128-CTR";
    $iv_length      = openssl_cipher_iv_length($chiper);
    $opt            = 0;
    $enc_iv         = '1234567891011121';
    $enc_key        = "wisecs";
    $enc_string1    = openssl_encrypt($string, $chiper, $enc_key, $opt, $enc_iv);
    $enc_pass       = openssl_encrypt($password, $chiper, $enc_key, $opt, $enc_iv);

    if (empty($id)) {
        header("Location: ../../pages/screen/user_profile.php?error=ID User is required");
        exit();
    } else if (empty($username)) {
        header("Location: ../../pages/screen/user_profile.php?error=Username is required");
        exit();
    } else if (empty($name)) {
        header("Location: ../../pages/screen/user_profile.php?error=Full Name is required!");
        exit();
    } else if (empty($password)) {
        header("Location: ../../pages/screen/user_profile.php?error=Password is required!");
        exit();
    } else if (empty($level)) {
        header("Location: ../../pages/screen/user_profile.php?error=Level is required!");
        exit();
    } else {
        $sql = "UPDATE user SET 
                id_user='$id',
                username='$username', 
                nama_lengkap='$name',
                email='$email',
                alamat='$alamat',
                moto_hidup='$moto_hidup',
                password='$enc_pass',
                level='$level' WHERE id_user='$id'";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../pages/screen/user_profile.php?id=" . $enc_string1);
            exit();
        } else {
            header("Location: ../../pages/screen/user_profile.php?error=Something happened! Check your data again!");
            exit();
        }
    }
} else {
    header("Location: ../../pages/screen/user_profile.php?error=Server Error!");
    exit();
}
