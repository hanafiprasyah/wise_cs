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
                    <h3 class="m-0">Survey</h3>
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
                <?php if ($row['level'] != 'Teknisi') {
                ?>
                    <div class="col-md-4 mb-4">
                        <span class="badge badge-danger">New</span>
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseAddSurvey" role="button" aria-expanded="false" aria-controls="collapseAddSurvey">
                            <i class="fas fa-plus"></i> &nbsp Add New Survey
                        </a>
                    </div>
                    <!-- ADD NEW -->
                    <div class="col-md-12 collapse" id="collapseAddSurvey">
                        <div class="card shadow-lg rounded mx-4">
                            <div class="card-header border-transparent">
                                <!-- <h3 class="card-title">Add New Survey</h3>
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
                                        <form class="form-horizontal" action="../../database/survey/add_survey.php" method="POST">
                                            <div class="form-group row">
                                                <label for="id_survey" class="col-sm-4 col-form-label">WISE P.I.C.</label>
                                                <div class="col-sm-8">
                                                    <select name="id_survey" id="id_survey" class="form-control select2bs4" required>
                                                        <option value="">Select User</option>
                                                        <?php
                                                        $getIDuserPIC = "SELECT * FROM `user`;";
                                                        $connectDataPic = mysqli_query($conn, $getIDuserPIC);
                                                        while ($rowUserPIC = mysqli_fetch_array($connectDataPic)) {
                                                        ?>
                                                            <option value="<?php echo $rowUserPIC['username']; ?>" <?php if ($rowUserPIC['nama_lengkap'] == $rowUserPIC['username']) echo 'selected="selected"'; ?>><?php echo $rowUserPIC['nama_lengkap']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="survey_pic" class="col-sm-4 col-form-label">Customer P.I.C.</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="survey_pic" name="survey_pic" placeholder="Who are the P.I.C.?" required>
                                                    <span style="color: BLUE;">Example : IRWAN PRAYITNO</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_presentation" class="col-sm-4 col-form-label">Presentation Name</label>
                                                <div class="col-sm-8">
                                                    <select name="id_presentation" id="id_presentation" class="form-control select2bs4" required>
                                                        <option value="">Select Presentation</option>
                                                        <?php
                                                        $getIDPres = "SELECT * FROM `presentation` WHERE presentation_status='Finished';";
                                                        $connectDataIdPres = mysqli_query($conn, $getIDPres);
                                                        while ($rowPres = mysqli_fetch_array($connectDataIdPres)) {
                                                        ?>
                                                            <option value="<?php echo $rowPres['id_presentation']; ?>" <?php if ($rowPres['presentation_name'] == $rowPres['id_presentation']) echo 'selected="selected"'; ?>><?php echo $rowPres['presentation_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="notel_survey" class="col-sm-4 col-form-label">Phone Number</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" id="notel_survey" name="notel_survey" placeholder="What is the P.I.C. Phone number?" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tech_team" class="col-sm-4 col-form-label">Engineer</label>
                                                <div class="col-sm-4">
                                                    <select name="tech_team" id="tech_team" class="form-control select2bs4" required>
                                                        <option value="">Select Engineer</option>
                                                        <?php
                                                        $getIDTech = "SELECT * FROM `user` WHERE level='Teknisi';";
                                                        $connectDataIdTech = mysqli_query($conn, $getIDTech);
                                                        while ($rowTech = mysqli_fetch_array($connectDataIdTech)) {
                                                        ?>
                                                            <option value="<?php echo $rowTech['nama_lengkap']; ?>" <?php if ($rowTech['nama_lengkap'] == $rowTech['username']) echo 'selected="selected"'; ?>><?php echo $rowTech['nama_lengkap']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="survey_date" class="col-sm-4 col-form-label">Survey Date</label>
                                                <div class="col-sm-6 input-group date" id="survey_date" data-target-input="nearest">
                                                    <input type="text" name="survey_date" id="survey_date" class="form-control datetimepicker-input" data-target="#survey_date" placeholder="Select the date" required />
                                                    <div class="input-group-append" data-target="#survey_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="survey_location" class="col-sm-4 col-form-label">Survey Location</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="survey_location" name="survey_location" placeholder="Where are you survey?" required>
                                                    <span style="color: BLUE;">Example : NUSAPHALA, JALAN CITRA INDAH 1, JATI ASIH, KOTA BEKASI</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-2">
                                                    <button type="submit" id="btnAddSurvey" name="btnAddSurvey" class="btn btn-block btn-success">Add</button>
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
                        <div class="card shadow rounded mx-1 my-2">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Survey</h3>
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
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                P.I.C.
                                            </th>
                                            <th class="text-center align-middle">
                                                Phone Number
                                            </th>
                                            <th class="text-center align-middle">
                                                Engineer
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.* FROM `survey` A 
                                    INNER JOIN presentation B
                                    USING (id_presentation)
                            WHERE MONTH(survey_date) = MONTH(CURRENT_DATE())
                            AND YEAR(survey_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowSurvey = $connecting->fetch_assoc()) {
                                                $client_name = $rowSurvey['client_name'];
                                                $survey_pic = $rowSurvey['survey_pic'];
                                                $tech_team = $rowSurvey['tech_team'];
                                                $survey = $rowSurvey['survey_date'];
                                                $survey_location = $rowSurvey['survey_location'];
                                                $presentation_name = $rowSurvey['presentation_name'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $notel_survey = $rowSurvey['notel_survey'];

                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_pic . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $notel_survey . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $tech_team . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_status . '</a>'; ?></td>
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
                        <div class="card shadow rounded mx-1 mt-2 mb-4">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Survey Data</h3>
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
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                P.I.C.
                                            </th>
                                            <th class="text-center align-middle">
                                                Phone Number
                                            </th>
                                            <th class="text-center align-middle">
                                                Engineer
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                            <th class="text-center align-middle">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.* FROM `survey` A 
                                    INNER JOIN presentation B
                                    USING (id_presentation);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowSurvey = $connecting->fetch_assoc()) {
                                                $id_survey = $rowSurvey['id_survey'];
                                                $client_name = $rowSurvey['client_name'];
                                                $survey_pic = $rowSurvey['survey_pic'];
                                                $survey = $rowSurvey['survey_date'];
                                                $survey_location = $rowSurvey['survey_location'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $presentation_name = $rowSurvey['presentation_name'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $notel_survey = $rowSurvey['notel_survey'];

                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_pic . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $notel_survey . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $tech_team . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_status . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '
                                                    <div class="row">
                                                        <form action="../../database/survey/edit_finished.php?id=' . $id_survey . '" method="POST">
                                                            <button type="submit" id="btnFinishSurvey" name="btnFinishSurvey" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Finished
                                                            </button>
                                                        </form>
                                                        <form action="../../database/survey/edit_not_yet.php?id=' . $id_survey . '" method="POST">
                                                            <button type="submit" id="btnNotYetSurvey" name="btnNotYetSurvey" class="btn btn-app bg-danger">
                                                            <i class="fas fa-times"></i> Not Yet
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
                <?php } else {
                ?>
                    <!-- MONTHLY -->
                    <div class="col-md-12">
                        <div class="card shadow rounded mx-1 my-2">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Survey
                                </h3>
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
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                P.I.C.
                                            </th>
                                            <th class="text-center align-middle">
                                                Phone Number
                                            </th>
                                            <th class="text-center align-middle">
                                                Engineer
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.* FROM `survey` A 
                                    INNER JOIN presentation B
                                    USING (id_presentation)
                            WHERE MONTH(survey_date) = MONTH(CURRENT_DATE())
                            AND YEAR(survey_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowSurvey = $connecting->fetch_assoc()) {
                                                $client_name = $rowSurvey['client_name'];
                                                $survey_pic = $rowSurvey['survey_pic'];
                                                $tech_team = $rowSurvey['tech_team'];
                                                $survey = $rowSurvey['survey_date'];
                                                $survey_location = $rowSurvey['survey_location'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $presentation_name = $rowSurvey['presentation_name'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $notel_survey = $rowSurvey['notel_survey'];

                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_pic . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $notel_survey . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $tech_team . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_status . '</a>'; ?></td>
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
                        <div class="card shadow rounded mx-1 mt-2 mb-4">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Survey Data</h3>
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
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                P.I.C.
                                            </th>
                                            <th class="text-center align-middle">
                                                Phone Number
                                            </th>
                                            <th class="text-center align-middle">
                                                Engineer
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Survey Location
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.* FROM `survey` A 
                                    INNER JOIN presentation B
                                    USING (id_presentation);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowSurvey = $connecting->fetch_assoc()) {
                                                $client_name = $rowSurvey['client_name'];
                                                $survey_pic = $rowSurvey['survey_pic'];
                                                $tech_team = $rowSurvey['tech_team'];
                                                $survey = $rowSurvey['survey_date'];
                                                $survey_location = $rowSurvey['survey_location'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $presentation_name = $rowSurvey['presentation_name'];
                                                $survey_status = $rowSurvey['survey_status'];
                                                $notel_survey = $rowSurvey['notel_survey'];

                                                $survey_date = date("F d, Y", strtotime($survey));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_pic . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $notel_survey . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $tech_team . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_date . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_location . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $survey_status . '</a>'; ?></td>
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