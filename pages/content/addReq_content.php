<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New maintenance request</h1>
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/mainreq/add_request.php" method="POST">
                                        <div class="form-group row">
                                            <label for="id_client" class="col-sm-4 col-form-label">Customer</label>
                                            <div class="col-sm-4">
                                                <select name="id_client" id="id_client" class="form-control select2bs4" required>
                                                    <option value="">Select Customer</option>
                                                    <?php
                                                    $getIDClient = "SELECT id_client, nama_customer FROM `client`;";
                                                    $connectDataIdClient = mysqli_query($conn, $getIDClient);
                                                    while ($row = mysqli_fetch_array($connectDataIdClient)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_client']; ?>" <?php if ($row['nama_customer'] == $row['id_client']) echo 'selected="selected"'; ?>><?php echo $row['nama_customer']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_project" class="col-sm-4 col-form-label">Serial Number</label>
                                            <div class="col-sm-4">
                                                <select name="id_project" id="id_project" class="form-control select2bs4" required>
                                                    <option value="">Select Serial Number</option>
                                                    <?php
                                                    $getIDProject = "SELECT id_project, sn FROM `project`;";
                                                    $connectDataIdProject = mysqli_query($conn, $getIDProject);
                                                    while ($row = mysqli_fetch_array($connectDataIdProject)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_project']; ?>" <?php if ($row['sn'] == $row['id_project']) echo 'selected="selected"'; ?>><?php echo $row['sn']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="id_user" class="col-sm-4 col-form-label">Engineer</label>
                                            <div class="col-sm-4">
                                                <select name="id_user" id="id_user" class="form-control select2bs4" required>
                                                    <option value="">Select Engineer</option>
                                                    <?php
                                                    $getIDUser = "SELECT id_user, nama_lengkap FROM `user` WHERE level='Teknisi';";
                                                    $connectDataIdUser = mysqli_query($conn, $getIDUser);
                                                    while ($row = mysqli_fetch_array($connectDataIdUser)) {
                                                    ?>
                                                        <option value="<?php echo $row['id_user']; ?>" <?php if ($row['nama_lengkap'] == $row['id_user']) echo 'selected="selected"'; ?>><?php echo $row['nama_lengkap']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="reported_by" class="col-sm-4 col-form-label">Reported by</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="reported_by" name="reported_by" placeholder="Who report it?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="req_date" class="col-sm-4 col-form-label">Request Date</label>
                                            <div class="col-sm-6 input-group date" id="req_date" data-target-input="nearest">
                                                <input type="text" name="req_date" id="req_date" class="form-control datetimepicker-input" data-target="#req_date" placeholder="Select the date" required />
                                                <div class="input-group-append" data-target="#req_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tech_description" class=" col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="tech_description" name="tech_description" placeholder="What is the customer problem?" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status_req" class="col-sm-4 col-form-label">Request Status</label>
                                            <div class="col-sm-4">
                                                <select name="status_req" id="status_req" class="form-control select2bs4" required>
                                                    <option value="">Select Status</option>
                                                    <option value="Waiting for sparepart">Waiting for sparepart</option>
                                                    <option value="Sending unit to factory">Sending unit to factory</option>
                                                    <option value="Need to replace unit">Need to replace unit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-2">
                                                <button type="submit" name="btnAddReq" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Send Request</button>
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