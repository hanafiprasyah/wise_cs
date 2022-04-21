<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add new customer</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['error']; ?>
                                </div>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/client/add_client.php" method="POST">
                                        <?php
                                        $getIDProject = 'SELECT id_client FROM client ORDER BY id_client DESC LIMIT 1';
                                        $connectData = mysqli_query($conn, $getIDProject);
                                        if ($row = mysqli_fetch_array($connectData)) {
                                        ?>
                                            <div class="form-group row">
                                                <label for="id_client" class="col-sm-4 col-form-label">Customer ID</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_client" name="id_client" placeholder="Queue" disabled value="<?php echo $row['id_client'] + 1; ?>" required>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <label for="nama_customer" class="col-sm-4 col-form-label">Customer Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Who is your customer? PT or CV?" required>
                                                <span style="color: BLUE;">Example : PT. WIBAWA SOLUSI ELEKTRIK</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat_customer" class="col-sm-4 col-form-label">Customer Address</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Where is your customer address?">
                                                <span style="color: BLUE;">Example : Jalan Jati Asih Raya Nomor 350, Jati Asih, Kota Bekasi</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_customer" class="col-sm-4 col-form-label">Managed by &nbsp;<span class="badge badge-danger">New</span></label>
                                            <div class="col-sm-6">
                                                <select name="jenis_customer" id="jenis_customer" class="form-control select2bs4" style="width: 100%;" required>
                                                    <option selected>Select Type</option>
                                                    <option value="Government">Government</option>
                                                    <option value="Private">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_customer" class="col-sm-4 col-form-label">Customer Status &nbsp;<span class="badge badge-danger">New</span></label>
                                            <div class="col-sm-6">
                                                <select name="status_customer" id="status_customer" class="form-control select2bs4" style="width: 100%;" required>
                                                    <option selected>Select Status</option>
                                                    <option value="Customer">Customer</option>
                                                    <option value="Pre-Customer">Pre-Customer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-4">
                                                <button type="submit" name="btnAddClient" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Add This Customer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->