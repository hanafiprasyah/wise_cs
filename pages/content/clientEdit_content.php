<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit customer</h1>
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
                <div class="col-md-12 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/client/edit_client.php?id=<?php echo $id_url; ?>" method="POST">
                                        <div class="form-group row">
                                            <label for="id_client" class="col-sm-4 col-form-label">Customer ID</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="id_client" name="id_client" placeholder="ID?" value="<?php echo $rowDataClient['id_client']; ?>" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <span class="info-box-text text-center align-middle text-danger">Warning! <b>DO NOT CHANGE</b> this customer ID as much as possible!</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_client" class="col-sm-4 col-form-label">Customer Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Who is your client? PT or CV?" value="<?php echo $rowDataClient['nama_customer']; ?>" required>
                                            </div>
                                        </div>
                                        <!--Material textarea-->
                                        <div class="form-group row">
                                            <label for="alamat_customer" class="col-sm-4 col-form-label">Customer Address</label>
                                            <div class="col-sm-6">
                                                <textarea id="alamat_customer" class="form-control" name="alamat_customer" placeholder="Where is your customer address?" class="md-textarea form-control" rows="3"><?php echo $rowDataClient['alamat_customer']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_customer" class="col-sm-4 col-form-label">Managed by</label>
                                            <div class="col-sm-6">
                                                <select name="jenis_customer" id="jenis_customer" class="form-control select2bs4" style="width: 100%;" required>
                                                    <option selected>Select Type</option>
                                                    <option value="Government">Government</option>
                                                    <option value="Private">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_customer" class="col-sm-4 col-form-label">Customer Status</label>
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
                                            <div class="offset-sm-4 col-sm-2">
                                                <button type="submit" name="btnEditClient" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Save Change(s)</button>
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