<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?php echo $row['level']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row mx-2">
            <div class="col-md-12 mb-4">
                <!-- Default box -->
                <div class="row">
                    <?php
                    $sqlUser = "SELECT * FROM `user` WHERE NOT id_user='" . $row['id_user'] . "' ORDER BY level ASC;";
                    $connectUser = mysqli_query($conn, $sqlUser);
                    if ($connectUser) {
                        while ($rowUser = $connectUser->fetch_assoc()) {
                            $id             = $rowUser['id_user'];
                            $username       = $rowUser['username'];
                            $nama           = $rowUser['nama_lengkap'];
                            $email          = $rowUser['email'];
                            $alamat         = $rowUser['alamat'];
                            $status         = $rowUser['login_status'];
                            $moto_hidup     = $rowUser['moto_hidup'];
                            $level          = $rowUser['level'];
                            $foto           = $rowUser['foto'];
                    ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light shadow rounded d-flex flex-fill">
                                    <!-- Level -->
                                    <div class="card-header text-muted border-bottom-0">
                                        <?php if ($status == 'Online') {
                                        ?>
                                            <!--<div class="text-center">-->
                                            <!--    <img src="../../dist/img/online.png" alt="online" width="10" height="10">-->
                                            <!--</div>-->
                                            <div class="alert alert-success" role="alert">
                                                Online
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <!--<div class="text-center">-->
                                            <!--    <img src="../../dist/img/offline.png" alt="offline" width="10" height="10">-->
                                            <!--</div>-->
                                            <div class="alert alert-secondary" role="alert">
                                                Offline
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php echo $level; ?>
                                    </div>
                                    <!-- CardBody -->
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b><?php echo $nama; ?></b></h2>
                                                <p class="text-muted text-sm"><b>Motto: </b> <?php echo $moto_hidup; ?> </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <?php echo $email; ?></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-map-marker"></i></span> <?php echo $alamat; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <?php
                                                echo '<img src="data:image/jpeg/;base64,' . base64_encode($rowUser['foto']) . '" alt="user-avatar" class="img-circle img-fluid">';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CardFooter -->
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="../screen/user_detail.php?id=<?php echo $id; ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i>&nbspView&nbspProfile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        $connectUser->free();
                    } ?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>