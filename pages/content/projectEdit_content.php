<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Installation</h1>
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
                                    <form class="form-horizontal" action="../../database/project/edit_project.php?id=<?php echo $id_url; ?>" method="POST">
                                        <?php
                                        $getIDProject = 'SELECT id_project FROM project ORDER BY id_project DESC LIMIT 1';
                                        $connectData = mysqli_query($conn, $getIDProject);
                                        if ($row = mysqli_fetch_array($connectData)) {
                                        ?>
                                            <div class="form-group row">
                                                <label for="id_project" class="col-sm-4 col-form-label">Installation ID</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_project" name="id_project" placeholder="id_project" value="<?php echo $rowDatas['id_project']; ?>" required>
                                                    <span class="info-box-text text-center text-danger">Warning! <b>DO NOT CHANGE</b> this Project ID as much as possible!</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <label for="id_client" class="col-sm-4 col-form-label">Customer ID</label>
                                            <div class="col-sm-4">
                                                <select name="id_client" id="id_client" class="form-control select2bs4" required>
                                                    <option value="">Select Client</option>
                                                    <?php
                                                    $getIDClient = "SELECT A.id_client, B.nama_customer FROM `project` A 
                                                                    INNER JOIN client B 
                                                                    USING (id_client) 
                                                                    WHERE id_project = '" . $id_url . "' ORDER BY nama_customer ASC;";
                                                    $connectDataIdClient = mysqli_query($conn, $getIDClient);
                                                    while ($row = mysqli_fetch_array($connectDataIdClient)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_client']; ?>" <?php if ($row['nama_customer'] == $row['id_client']) echo 'selected="selected"'; ?>><?php echo $row['nama_customer']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_product" class="col-sm-4 col-form-label">Product ID</label>
                                            <div class="col-sm-4">
                                                <select name="id_product" id="id_product" class="form-control select2bs4" required>
                                                    <option value="">Select Product</option>
                                                    <?php
                                                    $getIDProduct = "SELECT A.id_product, B.tipe_produk FROM `project` A
                                                                    INNER JOIN product B
                                                                    USING (id_product)
                                                                    WHERE id_project = '" . $id_url . "'";
                                                    $connectDataIdProduct = mysqli_query($conn, $getIDProduct);
                                                    while ($row = mysqli_fetch_array($connectDataIdProduct)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_product']; ?>" <?php if ($row['tipe_produk'] == $row['id_product']) echo 'selected="selected"'; ?>><?php echo $row['tipe_produk']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pic" class="col-sm-4 col-form-label">P.I.C</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="pic" name="pic" placeholder="Person In Charge?" value="<?php echo $rowDatas['pic']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="notel" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="notel" name="notel" placeholder="What is the phone number of P.I.C.?" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $rowDatas['notel']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="serial_number" class="col-sm-4 col-form-label">Serial Number</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="What is the SN of the purchased product?" value="<?php echo $rowDatas['sn']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jumlah_pesanan" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="How much item ordered?" value="<?php echo $rowDatas['jumlah_pesanan']; ?>" required>
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
                                            <label for="lokasi_pemasangan" class="col-sm-4 col-form-label">Installing location</label>
                                            <div class="col-sm-6">
                                                <!-- <input type="text" class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" placeholder="Where is it?" value="" required> -->
                                                <textarea class="form-control" id="lokasi_pemasangan" name="lokasi_pemasangan" placeholder="Where is it?" required><?php echo $rowDatas['lokasi_pemasangan']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_pemasangan" class="col-sm-4 col-form-label">Installing Date</label>
                                            <div class="col-sm-6 input-group date" id="tgl_pemasangan" data-target-input="nearest">
                                                <input type="text" value="<?php echo $rowDatas['tgl_pemasangan']; ?>" placeholder="Select the date" name="tgl_pemasangan" id="tgl_pemasangan" class="form-control datetimepicker-input" data-target="#tgl_pemasangan" required />
                                                <div class="input-group-append" data-target="#tgl_pemasangan" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-sm-4 col-form-label">Description (Optional)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="If you want to tell something about this project?" value="<?php echo $rowDatas['deskripsi']; ?>">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-2">
                                                <button type="submit" name="btnEditProject" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Save Change(s)</button>
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