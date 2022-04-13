<?php

if (isset($_SESSION['username'])) {
    $result = mysqli_query($conn, "SELECT token FROM login_token where id_user='" . $_SESSION['id_user'] . "'");

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $token = $row['token'];

        if ($_SESSION['token'] != $token) {
            session_destroy();
            header('Location: ../../index.php');
            exit();
        }
    }
}
