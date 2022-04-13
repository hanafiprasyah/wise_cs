<?php
include "./koneksi.php";
include "./check_token.php";

function getIPAddress()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR']     = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP']  = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    $client     = @$_SERVER['HTTP_CLIENT_IP'];
    $forward    = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote     = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/OPR/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    } elseif (preg_match('/Edge/i', $u_agent)) {
        $bname = 'Edge';
        $ub = "Edge";
    } elseif (preg_match('/Trident/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

// Generate token
function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max - 1)];
    }

    return $token;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $user_ip  = getIPAddress();
    $ua       = getBrowser();

    //captcha
    $result = $_POST['result'];
    $number1 = $_POST['angka1'];
    $number2 = $_POST['angka2'];
    $total = $number1 + $number2;

    if (empty($username)) {
        header("Location: ../../pages/screen/login.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: ../../pages/screen/login.php?error=Password is required!");
        exit();
    } else {
        // Encrypt 
        $chiper         = "AES-128-CTR";
        $iv_length      = openssl_cipher_iv_length($chiper);
        $opt            = 0;
        $enc_iv         = '1234567891011121';
        $enc_key        = "wisecs";
        $enc_pass       = openssl_encrypt($password, $chiper, $enc_key, $opt, $enc_iv);
        // $dec_iv         = '1234567891011121';
        // $dec_key        = "wisecs";
        // $dec_pass       = openssl_decrypt($enc_pass, $chiper, $dec_key, $opt, $dec_iv);

        $login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$enc_pass' AND user_status = 'ACTIVE';");
        if (mysqli_num_rows($login) === 1) {
            $row = mysqli_fetch_array($login);
            if ($row['username'] == $username && $row['password'] == $enc_pass) {
                if ($result == $total) {
                    session_start();

                    $token = getToken(10);
                    $_SESSION['token']                  = $token;
                    $_SESSION['id_user']                = $row['id_user'];
                    $_SESSION['username']               = $row['username'];
                    $_SESSION['password']               = $row['password'];
                    $_SESSION['nama_lengkap']           = $row['nama_lengkap'];
                    $_SESSION['level']                  = $row['level'];
                    $_SESSION['alamat']                 = $row['alamat'];
                    $_SESSION['moto_hidup']             = $row['moto_hidup'];
                    $_SESSION['login_status']           = $row['login_status'];
                    $_SESSION['email']                  = $row['email'];
                    $_SESSION['foto']                   = $row['foto'];

                    $conn->query(
                        "INSERT INTO `login_session`(
                            `id_session`, 
                            `ip_address`,
                            `browser`,
                            `platform`,
                            `reports`, 
                            `id_user`
                            ) VALUES (
                                '',
                                '" . $user_ip . "',
                                '" . $ua['name'] . "',
                                '" . $ua['platform'] . "',
                                '" . $ua['userAgent'] . "',
                                '" . $_SESSION['id_user'] . "'
                            )"
                    );

                    $conn->query(
                        "UPDATE `user` SET `login_status`='Online' WHERE id_user = '" . $_SESSION['id_user'] . "';"
                    );

                    // Update user token 
                    $result_token = mysqli_query($conn, "select count(*) as allcount from login_token where id_user='" . $_SESSION['id_user'] . "' ");
                    $row_token = mysqli_fetch_assoc($result_token);
                    if ($row_token['allcount'] > 0) {
                        mysqli_query($conn, "update login_token set token='" . $token . "' where id_user='" . $_SESSION['id_user'] . "'");
                    } else {
                        mysqli_query($conn, "insert into login_token(token,id_user) values('" . $token . "','" . $_SESSION['id_user'] . "')");
                    }

                    header("Location: ../../index.php");
                    exit();
                } else {
                    header("Location: ../../pages/screen/login.php?error=Wrong Captcha! Try again.");
                    exit();
                }
            } else {
                header("Location: ../../pages/screen/login.php?error=Incorrect Username or Password!");
                exit();
            }
        } else {
            header("Location: ../../pages/screen/login.php?error=Your account has been banned by Administrator!");
            exit();
        }
    }
} else {
    header("Location: ../../pages/screen/login.php?error=Server Error!");
    exit();
}

mysqli_close($conn);
