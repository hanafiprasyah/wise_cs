<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Relation</h1>
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
                <div class="col-md-12 mb-5">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/relation/add_relation.php" method="POST">
                                        <div class="form-group row">
                                            <label for="nama_rel" class="col-sm-4 col-form-label">Company Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama_rel" name="nama_rel" placeholder="What is the company name?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_rel" class="col-sm-4 col-form-label">Relation Type</label>
                                            <div class="col-sm-4">
                                                <select name="jenis_rel" id="jenis_rel" class="form-control select2bs4" required>
                                                    <option value="Principal">Principal</option>
                                                    <option value="Vendor">Vendor</option>
                                                    <option value="Partner">Partner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat_rel" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-6">
                                                <!-- <input type="text" class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" placeholder="Where is it?" required> -->
                                                <textarea class="form-control" id="alamat_rel" name="alamat_rel" placeholder="Where is it?" required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-4">
                                                <button type="submit" name="btnAddRelation" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Save Relation Data</button>
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