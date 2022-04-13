<?php
$id = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id);

// Encrypt 
$origin1        = "Dashboard";
$origin2        = "SessionMonitoring";
$chiper         = "AES-128-CTR";
$iv_length      = openssl_cipher_iv_length($chiper);
$opt            = 0;
$enc_iv         = '1234567891011121';
$enc_key        = "wisecs";
$enc_string1    = openssl_encrypt($origin1, $chiper, $enc_key, $opt, $enc_iv);
$enc_string2    = openssl_encrypt($origin2, $chiper, $enc_key, $opt, $enc_iv);

?>
<div class="row">
    <div class="col-sm-12">
        <li class="<?php echo $id_url != $enc_string1 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
            <a href="../screen/dashboard.php?id=<?php echo $enc_string1; ?>" class="<?php echo $id_url != $enc_string1 ? 'nav-link' : 'nav-link active' ?>">
                <i class="fa fa-home nav-icon"></i>
                <p> &nbsp Dashboard</p>
            </a>
        </li>
    </div>
    <div class="col-sm-12">
        <?php
        $year = date("Y");
        if ($row['level'] == 'Administrator' || $row['level'] == 'Direksi') {
        ?>
            <li class="<?php echo $id_url != $enc_string2 ? 'nav-item menu-close' : 'nav-item menu-open' ?>">
                <a href="../screen/session_monitoring.php?id=<?php echo $enc_string2; ?>" class="<?php echo $id_url != $enc_string2 ? 'nav-link' : 'nav-link active' ?>">
                    <i class="fas fa-desktop"></i>
                    <p> &nbsp Monitoring</p>
                </a>
            </li>
        <?php
        }
        ?>
    </div>
</div>
<!-- dasboardPdom01oYm0Zgr1mLMSPFmkI0i30in -->