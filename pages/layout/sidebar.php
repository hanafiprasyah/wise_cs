<?php
// Encrypt 
$origin1        = "UserProfile";
$chiper         = "AES-128-CTR";
$iv_length      = openssl_cipher_iv_length($chiper);
$opt            = 0;
$enc_iv         = '1234567891011121';
$enc_key        = "wisecs";
$enc_string1    = openssl_encrypt($origin1, $chiper, $enc_key, $opt, $enc_iv);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php echo
                '<img class="img-circle elevation-2"
                        src="data:image/jpeg/;base64,' . base64_encode($_SESSION['foto']) . '"
                        alt="User profile picture">';
                ?>
            </div>
            <div class="info">
                <a href="../screen/user_profile.php?id=<?php echo $enc_string1 ?>" class="d-block"><?php echo $row['nama_lengkap']; ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php include '../layout/menus/main_menus.php'; ?>
                <li class="nav-header">EXTRA</li>
                <!-- HIDE EXTRA MENU using NONE -->
                <div style="display:block">
                    <?php include '../layout/menus/extra_menus.php'; ?>
                </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- /.mainSidebar -->