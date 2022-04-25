<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Installation</h1>
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
                <div class="col-md-12 mb-5">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/project/add_project.php" method="POST">
                                        <?php
                                        $getIDProject = 'SELECT id_project FROM project ORDER BY id_project DESC LIMIT 1';
                                        $connectData = mysqli_query($conn, $getIDProject);
                                        if ($row = mysqli_fetch_array($connectData)) {
                                        ?>
                                            <div class="form-group row">
                                                <label for="id_project" class="col-sm-4 col-form-label">Installation Queue</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_project" name="id_project" placeholder="id_project" disabled value="<?php echo $row['id_project'] + 1; ?>" required>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <label for="id_client" class="col-sm-4 col-form-label">Customer</label>
                                            <div class="col-sm-4">
                                                <select name="id_client" id="id_client" class="form-control select2bs4" required>
                                                    <option value="">Select Customer</option>
                                                    <?php
                                                    $getIDClient = "SELECT id_client, nama_customer FROM `client` WHERE status_customer='Customer' ORDER BY nama_customer ASC;";
                                                    $connectDataIdClient = mysqli_query($conn, $getIDClient);
                                                    while ($row = mysqli_fetch_array($connectDataIdClient)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_client']; ?>" <?php if ($row['nama_customer'] == $row['id_client']) echo 'selected="selected"'; ?>><?php echo $row['nama_customer']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_product" class="col-sm-4 col-form-label">Product</label>
                                            <div class="col-sm-4">
                                                <select name="id_product" id="id_product" class="form-control select2bs4" required>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    $getIDProduct = "SELECT id_product, tipe_produk FROM `product` ORDER BY tipe_produk ASC;";
                                                    $connectDataIdProduct = mysqli_query($conn, $getIDProduct);
                                                    while ($row = mysqli_fetch_array($connectDataIdProduct)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_product']; ?>" <?php if ($row['tipe_produk'] == $row['id_product']) echo 'selected="selected"'; ?>><?php echo $row['tipe_produk']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pic" class="col-sm-4 col-form-label">P.I.C.</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="pic" name="pic" placeholder="Person In Charge?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="notel" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="notel" name="notel" placeholder="What is the phone number of P.I.C.?" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="serial_number" class="col-sm-4 col-form-label">Serial Number</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="What is the SN of the purchased product?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_pesanan" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="How much item ordered?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="satuan" class="col-sm-4 col-form-label">Unit of Product</label>
                                            <div class="col-sm-4">
                                                <select name="satuan" id="satuan" class="form-control select2bs4" style="width: 30%;" required>
                                                    <option value="UNIT">Unit</option>
                                                    <option value="PAKET">Paket</option>
                                                    <option value="IOT">IoT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lokasi_pemasangan" class="col-sm-4 col-form-label">Installing Location</label>
                                            <div class="col-sm-6">
                                                <!-- <input type="text" class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" placeholder="Where is it?" required> -->
                                                <textarea class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" placeholder="Where is it?" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="garansi" class="col-sm-4 col-form-label">Warranty</label>
                                            <div class="col-sm-6">
                                                <select name="garansi" id="garansi" class="form-control select2bs4" style="width: 30%;" required>
                                                    <option value="1">1 Years</option>
                                                    <option value="2">2 Years</option>
                                                    <option value="3">3 Years</option>
                                                    <option value="4">4 Years</option>
                                                    <option value="5">5 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="frekuensi" class="col-sm-4 col-form-label">Visit Frequency</label>
                                            <div class="col-sm-6">
                                                <select name="frekuensi" id="frekuensi" class="form-control select2bs4" style="width: 30%;" required>
                                                    <option value="3 months">per 3 Month</option>
                                                    <option value="6 months">per 6 Month</option>
                                                    <option value="novisiting">No Visiting</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pemasangan" class="col-sm-4 col-form-label">Installing Date</label>
                                            <div class="col-sm-6 input-group date" id="tgl_pemasangan" data-target-input="nearest">
                                                <input type="text" name="tgl_pemasangan" id="tgl_pemasangan" class="form-control datetimepicker-input" data-target="#tgl_pemasangan" placeholder="Select the date" required />
                                                <div class="input-group-append" data-target="#tgl_pemasangan" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-4 col-form-label">Description (Optional)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="If you want to tell something about this project?">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-4">
                                                <button type="submit" name="btnAddProject" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Add This Installation</button>
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