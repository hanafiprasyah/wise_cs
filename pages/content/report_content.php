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
                    <h3 class="m-0">Survey Report</h3>
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
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseAddReport" role="button" aria-expanded="false" aria-controls="collapseAddReport">
                            <i class="fas fa-plus"></i> &nbsp Add New Report
                        </a>
                    </div>
                    <!-- ADD NEW -->
                    <div class="col-md-12 collapse" id="collapseAddReport">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <!-- <h3 class="card-title">Add New Report</h3>
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
                                        <form class="form-horizontal" action="../../database/report/add_report.php?entry_by=<?php echo $row['username']; ?>" method="POST">
                                            <!-- <div class="form-group row">
                                                <label for="id_report" class="col-sm-4 col-form-label">Entry by</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_report" name="id_report" placeholder="Fill with your SIMPLE NAME!" required>
                                                    <span style="color: BLUE;">Example : <a style="color: RED;">H</a>anafi (Using CAPITAL in the first row of your name)</span>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label for="id_survey" class="col-sm-4 col-form-label">Survey Activity</label>
                                                <div class="col-sm-4">
                                                    <select name="id_survey" id="id_survey" class="form-control select2bs4" required>
                                                        <option value="">Select Survey</option>
                                                        <?php
                                                        $getIDSurv = "SELECT * FROM `survey` WHERE survey_status='Finished';";
                                                        $connectDataIdSurv = mysqli_query($conn, $getIDSurv);
                                                        while ($rowSurv = mysqli_fetch_array($connectDataIdSurv)) {
                                                        ?>
                                                            <option value="<?php echo $rowSurv['id_survey']; ?>" <?php if ($rowSurv['survey_location'] == $rowSurv['id_survey']) echo 'selected="selected"'; ?>><?php echo $rowSurv['survey_location']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="report_title" class="col-sm-4 col-form-label">Report Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="report_title" name="report_title" placeholder="What is the title?" required>
                                                    <span style="color: BLUE;">Example : LAPORAN SURVEY BOJONG KULUR</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="report_created" class="col-sm-4 col-form-label">Report Created</label>
                                                <div class="col-sm-6 input-group date" id="report_created" data-target-input="nearest">
                                                    <input type="text" name="report_created" id="report_created" class="form-control datetimepicker-input" data-target="#report_created" placeholder="Select the date" required />
                                                    <div class="input-group-append" data-target="#report_created" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_user" class="col-sm-4 col-form-label">Report Editor</label>
                                                <div class="col-sm-4">
                                                    <select name="id_user" id="id_user" class="form-control select2bs4" required>
                                                        <option value="">Created by?</option>
                                                        <?php
                                                        $getUserCreator = "SELECT * FROM `user`;";
                                                        $connectDataUserCreator = mysqli_query($conn, $getUserCreator);
                                                        while ($rowUserCreator = mysqli_fetch_array($connectDataUserCreator)) {
                                                        ?>
                                                            <option value="<?php echo $rowUserCreator['id_user']; ?>" <?php if ($rowUserCreator['nama_lengkap'] == $rowUserCreator['id_user']) echo 'selected="selected"'; ?>><?php echo $rowUserCreator['nama_lengkap']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-2">
                                                    <button type="submit" name="btnAddReport" class="btn btn-block btn-success">Add Report</button>
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
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Report</h3>
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
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Created by
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Created
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.survey_location, B.survey_date, C.nama_lengkap FROM `report` A
                                        INNER JOIN survey B
                                        USING (id_survey)
                                        INNER JOIN user C
                                        USING (id_user)
                            WHERE MONTH(report_created) = MONTH(CURRENT_DATE())
                            AND YEAR(report_created) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowReport1 = $connecting->fetch_assoc()) {
                                                $created_by = $rowReport1['nama_lengkap'];
                                                $report_title = $rowReport1['report_title'];
                                                $survey_location = $rowReport1['survey_location'];
                                                $survey = $rowReport1['survey_date'];
                                                $created = $rowReport1['report_created'];
                                                $report_status = $rowReport1['report_status'];

                                                $report_created = date("F d, Y", strtotime($created));
                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $created_by . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_created . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_status . '</a>'; ?></td>
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
                                <h3 class="card-title">All Report Data</h3>
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
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Created by
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Created
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Status
                                            </th>
                                            <th class="text-center align-middle">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.survey_location, B.survey_date, C.nama_lengkap FROM `report` A
                                        INNER JOIN survey B
                                        USING (id_survey)
                                        INNER JOIN user C
                                        USING (id_user);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowAllReport = $connecting->fetch_assoc()) {
                                                $created_by = $rowAllReport['nama_lengkap'];
                                                $id_report = $rowAllReport['id_report'];
                                                $report_title = $rowAllReport['report_title'];
                                                $survey_location = $rowAllReport['survey_location'];
                                                $survey = $rowAllReport['survey_date'];
                                                $created = $rowAllReport['report_created'];
                                                $report_status = $rowAllReport['report_status'];

                                                $report_created = date("F d, Y", strtotime($created));
                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $created_by . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_created . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_status . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '
                                                    <div class="row">
                                                        <form action="../../database/report/edit_finished.php?id=' . $id_report . '" method="POST">
                                                            <button type="submit" id="btnFinishedRep" name="btnFinishedRep" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Finished
                                                            </button>
                                                        </form>
                                                        <form action="../../database/report/edit_delayed.php?id=' . $id_report . '" method="POST">
                                                            <button type="submit" id="btnDelayedRep" name="btnDelayedRep" class="btn btn-app bg-warning">
                                                            <i class="fas fa-clock"></i> Delayed
                                                            </button>
                                                        </form>
                                                        <form action="../../database/report/edit_started.php?id=' . $id_report . '" method="POST">
                                                            <button type="submit" id="btnStartedRep" name="btnStartedRep" class="btn btn-app bg-info">
                                                            <i class="fas fa-play"></i> Just Started
                                                            </button>
                                                        </form>
                                                        <form action="../../database/report/edit_cancel.php?id=' . $id_report . '" method="POST">
                                                            <button type="submit" id="btnCancelRep" name="btnCancelRep" class="btn btn-app bg-danger">
                                                            <i class="fas fa-times"></i> Cancel
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
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Report</h3>
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
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Created by
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Created
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.survey_location, B.survey_date, C.nama_lengkap FROM `report` A
                                        INNER JOIN survey B
                                        USING (id_survey)
                                        INNER JOIN user C
                                        USING (id_user)
                            WHERE MONTH(report_created) = MONTH(CURRENT_DATE())
                            AND YEAR(report_created) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowReport1 = $connecting->fetch_assoc()) {
                                                $created_by = $rowReport1['nama_lengkap'];
                                                $report_title = $rowReport1['report_title'];
                                                $survey_location = $rowReport1['survey_location'];
                                                $survey = $rowReport1['survey_date'];
                                                $created = $rowReport1['report_created'];
                                                $report_status = $rowReport1['report_status'];

                                                $report_created = date("F d, Y", strtotime($created));
                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $created_by . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_created . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_status . '</a>'; ?></td>
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
                                <h3 class="card-title">All Report Data</h3>
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
                                                Report Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Created by
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Created
                                            </th>
                                            <th class="text-center align-middle">
                                                Report Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.survey_location, B.survey_date, C.nama_lengkap FROM `report` A
                                        INNER JOIN survey B
                                        USING (id_survey)
                                        INNER JOIN user C
                                        USING (id_user);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowAllReport = $connecting->fetch_assoc()) {
                                                $created_by = $rowAllReport['nama_lengkap'];
                                                $report_title = $rowAllReport['report_title'];
                                                $survey_location = $rowAllReport['survey_location'];
                                                $survey = $rowAllReport['survey_date'];
                                                $created = $rowAllReport['report_created'];
                                                $report_status = $rowAllReport['report_status'];

                                                $report_created = date("F d, Y", strtotime($created));
                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $created_by . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_created . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $report_status . '</a>'; ?></td>
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