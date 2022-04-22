<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
    $monthName = date("F");
    $year  = date("Y");
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Quotation</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?php echo $row['level']; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($row['level'] != 'Teknisi') {
                ?>
                    <div class="col-md-4 mb-4">
                        <span class="badge badge-danger">New</span>
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseAddQuo" role="button" aria-expanded="false" aria-controls="collapseAddQuo">
                            <i class="fas fa-plus"></i> &nbsp Add New Quotation
                        </a>
                    </div>
                    <!-- ADD NEW -->
                    <div class="col-md-12 collapse" id="collapseAddQuo">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <!-- <h3 class="card-title">Add New Quotation</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div> -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="../../database/quotation/add_quotation.php?entry_by=<?php echo $row['username']; ?>" method="POST">
                                            <!-- <div class="form-group row">
                                                <label for="id_quotation" class="col-sm-4 col-form-label">Entry by</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_quotation" name="id_quotation" placeholder="Fill with your SIMPLE NAME!" required>
                                                    <span style="color: BLUE;">Example : <a style="color: RED;">H</a>anafi (Using CAPITAL in the first row of your name)</span>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label for="id_user" class="col-sm-4 col-form-label">Chairman</label>
                                                <div class="col-sm-4">
                                                    <select name="id_user" id="id_user" class="form-control select2bs4" required>
                                                        <option value="">Select User</option>
                                                        <?php
                                                        $getIDuser = "SELECT * FROM `user` WHERE level='Direksi';";
                                                        $connectDataUser = mysqli_query($conn, $getIDuser);
                                                        while ($rowUser = mysqli_fetch_array($connectDataUser)) {
                                                        ?>
                                                            <option value="<?php echo $rowUser['nama_lengkap']; ?>" <?php if ($rowUser['nama_lengkap'] == $rowUser['id_user']) echo 'selected="selected"'; ?>><?php echo $rowUser['nama_lengkap']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_report" class="col-sm-4 col-form-label">Report Title</label>
                                                <div class="col-sm-4">
                                                    <select name="id_report" id="id_report" class="form-control select2bs4" required>
                                                        <option value="">Select Report</option>
                                                        <?php
                                                        $getIDreport = "SELECT * FROM `report` WHERE report_status='Finished';";
                                                        $connectReport = mysqli_query($conn, $getIDreport);
                                                        while ($rowReport = mysqli_fetch_array($connectReport)) {
                                                        ?>
                                                            <option value="<?php echo $rowReport['id_report']; ?>" <?php if ($rowReport['report_title'] == $rowReport['id_report']) echo 'selected="selected"'; ?>><?php echo $rowReport['report_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="quotation_date" class="col-sm-4 col-form-label">Quotation Date</label>
                                                <div class="col-sm-6 input-group date" id="quotation_date" data-target-input="nearest">
                                                    <input type="text" name="quotation_date" id="quotation_date" class="form-control datetimepicker-input" data-target="#quotation_date" placeholder="Select the date" required />
                                                    <div class="input-group-append" data-target="#quotation_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price" class="col-sm-4 col-form-label">Price</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="price" name="price" placeholder="How much is it?" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-2">
                                                    <button type="submit" name="btnAddQuotation" class="btn btn-block btn-success">Add</button>
                                                    <?php if (isset($_GET['error'])) { ?>
                                                        <p style="color: RED;"><?php echo $_GET['error']; ?></p>
                                                    <?php } ?>
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
                <?php
                }
                ?>
                <?php
                if ($row['level'] == 'Administrator' || $row['level'] == 'Admin Staff') {
                ?>
                    <!-- MONTHLY -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Quotation</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="withButton" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">
                                                User
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Price
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.report_title, B.report_status FROM quotation A
                                        INNER JOIN report B
                                        USING (id_report)
                                WHERE MONTH(quotation_date) = MONTH(CURRENT_DATE())
                                AND YEAR(quotation_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowQuot1 = $connecting->fetch_assoc()) {
                                                $nama_lengkap = $rowQuot1['nama_lengkap'];
                                                $report_title = $rowQuot1['report_title'];
                                                $report_status = $rowQuot1['report_status'];
                                                $quotation = $rowQuot1['quotation_date'];
                                                $price = $rowQuot1['price'];
                                                $quotation_status = $rowQuot1['quotation_status'];

                                                $quotation_date = date("F d, Y", strtotime($quotation));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_lengkap . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $price . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_status . '</a>'; ?></td>
                                                </tr>
                                        <?php
                                            }
                                            $connecting->free();
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ALL DATA -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Quotation Data</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="withButtonB" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">
                                                User
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Price
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Status
                                            </th>
                                            <th class="text-center align-middle">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.report_title, B.report_status FROM quotation A
                                        INNER JOIN report B
                                        USING (id_report);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowQuot2 = $connecting->fetch_assoc()) {
                                                $id_quotation = $rowQuot2['id_quotation'];
                                                $nama_lengkap = $rowQuot2['nama_lengkap'];
                                                $report_title = $rowQuot2['report_title'];
                                                $report_status = $rowQuot2['report_status'];
                                                $quotation = $rowQuot2['quotation_date'];
                                                $price = $rowQuot2['price'];
                                                $quotation_status = $rowQuot2['quotation_status'];

                                                $quotation_date = date("F d, Y", strtotime($quotation));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_lengkap . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $price . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_status . '</a>'; ?></td>
                                                    <td><?php echo '
                                                    <div class="row">
                                                        <form action="../../database/quotation/edit_success.php?id=' . $id_quotation . '" method="POST">
                                                            <button type="submit" id="btnSuccess" name="btnSuccess" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Success
                                                            </button>
                                                        </form>
                                                        <form action="../../database/quotation/edit_delayed.php?id=' . $id_quotation . '" method="POST">
                                                            <button type="submit" id="btnDelayed" name="btnDelayed" class="btn btn-app bg-warning">
                                                            <i class="fas fa-clock"></i> Delayed
                                                            </button>
                                                        </form>
                                                        <form action="../../database/quotation/edit_rejected.php?id=' . $id_quotation . '" method="POST">
                                                            <button type="submit" id="btnRejected" name="btnRejected" class="btn btn-app bg-danger">
                                                            <i class="fas fa-times"></i> Rejected
                                                            </button>
                                                        </form>
                                                        <form action="../../database/quotation/edit_renego.php?id=' . $id_quotation . '" method="POST">
                                                            <button type="submit" id="btnRenegotiateUpdate" name="btnRenegotiateUpdate" class="btn btn-app bg-info">
                                                            <i class="fas fa-handshake"></i> Renegotiate
                                                            </button>
                                                        </form>
                                                    </div>
                                                    '; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                            $connecting->free();
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <!-- MONTHLY -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Quotation</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="withButton" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">
                                                User
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Price
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.report_title, B.report_status FROM quotation A
                                        INNER JOIN report B
                                        USING (id_report)
                                WHERE MONTH(quotation_date) = MONTH(CURRENT_DATE())
                                AND YEAR(quotation_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowQuot1 = $connecting->fetch_assoc()) {
                                                $nama_lengkap = $rowQuot1['nama_lengkap'];
                                                $report_title = $rowQuot1['report_title'];
                                                $report_status = $rowQuot1['report_status'];
                                                $quotation = $rowQuot1['quotation_date'];
                                                $price = $rowQuot1['price'];
                                                $quotation_status = $rowQuot1['quotation_status'];

                                                $quotation_date = date("F d, Y", strtotime($quotation));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_lengkap . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $price . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_status . '</a>'; ?></td>
                                                </tr>
                                        <?php
                                            }
                                            $connecting->free();
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- ALL DATA -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Quotation Data</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="withButtonB" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">
                                                User
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Price
                                            </th>
                                            <th class="text-center align-middle">
                                                Quotation Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.report_title, B.report_status FROM quotation A
                                        INNER JOIN report B
                                        USING (id_report);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowQuot2 = $connecting->fetch_assoc()) {
                                                $id_quotation = $rowQuot2['id_quotation'];
                                                $nama_lengkap = $rowQuot2['nama_lengkap'];
                                                $report_title = $rowQuot2['report_title'];
                                                $report_status = $rowQuot2['report_status'];
                                                $quotation = $rowQuot2['quotation_date'];
                                                $price = $rowQuot2['price'];
                                                $quotation_status = $rowQuot2['quotation_status'];

                                                $quotation_date = date("F d, Y", strtotime($quotation));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_lengkap . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $price . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $quotation_status . '</a>'; ?></td>
                                                </tr>
                                        <?php
                                            }
                                            $connecting->free();
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>