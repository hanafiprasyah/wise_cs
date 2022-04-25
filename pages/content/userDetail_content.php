<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?php echo $row['level']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline shadow rounded">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php echo
                                '<img class="profile-user-img img-fluid img-circle"
                          src="data:image/jpeg/;base64,' . base64_encode($row['foto']) . '"
                          alt="User profile picture">';
                                ?>
                            </div>
                            <br>
                            <!-- src="../../dist/img/user4-128x128.jpg" -->

                            <h3 class="profile-username text-center"><?php echo $row['nama_lengkap']; ?></h3>

                            <p class="text-muted text-center"><?php echo $row['level']; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-12">
                    <!-- About Me Box -->
                    <div class="card card-primary shadow rounded">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-center">

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted"><?php echo $row['alamat']; ?></p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Motto</strong>

                            <p class="text-muted"><?php echo $row['moto_hidup']; ?></p>

                            <hr>

                            <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

                            <p class="text-muted"><?php echo $row['email']; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->