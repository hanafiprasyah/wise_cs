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
                    <h3 class="m-0">Presentation</h3>
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
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseAddPresentation" role="button" aria-expanded="false" aria-controls="collapseAddPresentation">
                            <i class="fas fa-plus"></i> &nbsp Add New Presentation
                        </a>
                    </div>
                    <!-- ADD NEW -->
                    <div class="col-md-12 collapse" id="collapseAddPresentation">
                        <div class="card shadow-lg rounded mx-4">
                            <div class="card-header border-transparent">
                                <!-- <h3 class="card-title">Add New Presentation</h3>
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
                                        <form class="form-horizontal" action="../../database/presentation/add_presentation.php?entry_by=<?php echo $row['username']; ?>" method="POST">
                                            <div class="form-group row">
                                                <label for="id_proposal" class="col-sm-4 col-form-label">Proposal</label>
                                                <div class="col-sm-8">
                                                    <select name="id_proposal" id="id_proposal" class="form-control select2bs4" required>
                                                        <option value="">Select Accepted Proposal</option>
                                                        <?php
                                                        $getID = "SELECT * FROM `proposal` WHERE proposal_status='Accepted';";
                                                        $connectData = mysqli_query($conn, $getID);
                                                        while ($row_proposal = mysqli_fetch_array($connectData)) {
                                                        ?>
                                                            <option value="<?php echo $row_proposal['id_proposal']; ?>" <?php if ($row_proposal['proposal_title'] == $row_proposal['id_proposal']) echo 'selected="selected"'; ?>><?php echo $row_proposal['proposal_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <label for="client_name" class="col-sm-4 col-form-label">Customer</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Who is your customer?" required>
                                                    <span style="color: BLUE;">Example : PT. WIBAWA SOLUSI ELEKTRIK</span>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label for="presentation_name" class="col-sm-4 col-form-label">Presentation Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="presentation_name" name="presentation_name" placeholder="What is your presentation title?" required>
                                                    <span style="color: BLUE;">Example : Keunggulan ETS dalam Menjaga Kualitas Listrik di Bekasi</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="id_presentation" class="col-sm-4 col-form-label">Presentator</label>
                                                <div class="col-sm-4">
                                                    <select name="id_presentation" id="id_presentation" class="form-control select2bs4" required>
                                                        <option value="">Select Presentator</option>
                                                        <?php
                                                        $getIdUser = "SELECT * FROM `user`;";
                                                        $connectDataPresentator = mysqli_query($conn, $getIdUser);
                                                        while ($rowPresentator = mysqli_fetch_array($connectDataPresentator)) {
                                                        ?>
                                                            <option value="<?php echo $rowPresentator['nama_lengkap']; ?>" <?php if ($rowPresentator['nama_lengkap'] == $rowPresentator['username']) echo 'selected="selected"'; ?>><?php echo $rowPresentator['nama_lengkap']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <label for="id_presentation" class="col-sm-4 col-form-label">Presentator</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_presentation" name="id_presentation" placeholder="Who is the presentator?" required>
                                                    <span style="color: BLUE;">Example : RIDWAN KAMIL</span>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label for="presentation_date" class="col-sm-4 col-form-label">Presentation Date</label>
                                                <div class="col-sm-6 input-group date" id="presentation_date" data-target-input="nearest">
                                                    <input type="text" name="presentation_date" id="presentation_date" class="form-control datetimepicker-input" data-target="#presentation_date" placeholder="Select the date" required />
                                                    <div class="input-group-append" data-target="#presentation_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-2">
                                                    <button type="submit" name="btnAddPresentation" class="btn btn-block btn-success">Add</button><br>
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
                <?php } ?>
                <?php
                if ($row['level'] == 'Administrator' || $row['level'] == 'Admin Staff') {
                ?>
                    <!-- MONTHLY -->
                    <div class="col-md-12">
                        <div class="card shadow rounded mx-1 my-2">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Presentation</h3>
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
                                                Proposal
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentator
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.*
                                    FROM `presentation` A 
                                    INNER JOIN proposal B
                                    USING (id_proposal)
                                    WHERE MONTH(presentation_date) = MONTH(CURRENT_DATE())
                                    AND YEAR(presentation_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowPresentation = $connecting->fetch_assoc()) {
                                                $presentator = $rowPresentation['presentator'];
                                                $presentation_name = $rowPresentation['presentation_name'];
                                                $id_proposal = $rowPresentation['id_proposal'];
                                                $title = $rowPresentation['proposal_title'];
                                                $date = $rowPresentation['presentation_date'];
                                                $status = $rowPresentation['presentation_status'];

                                                $presentationDate = date("F d, Y", strtotime($date));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentator . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentationDate . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $status . '</a>'; ?></td>
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
                                <h3 class="card-title">All Presentation Data</h3>
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
                                                Proposal
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentator
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Date
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
                                        $sql = "SELECT A.*, B.*
                                    FROM `presentation` A 
                                    INNER JOIN proposal B
                                    USING (id_proposal);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowPresentation = $connecting->fetch_assoc()) {
                                                $presentator = $rowPresentation['presentator'];
                                                $id_presentation = $rowPresentation['id_presentation'];
                                                $id_proposal = $rowPresentation['id_proposal'];
                                                $title = $rowPresentation['proposal_title'];
                                                $date = $rowPresentation['presentation_date'];
                                                $status = $rowPresentation['presentation_status'];

                                                $presentationDate = date("F d, Y", strtotime($date));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentator . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentationDate . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $status . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                        <form action="../../database/presentation/edit_finished.php?id=' . $id_presentation . '" method="POST">
                                                            <button type="submit" id="btnFinishedPresent" name="btnFinishedPresent" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Finished
                                                            </button>
                                                        </form>
                                                        <form action="../../database/presentation/edit_not_yet.php?id=' . $id_presentation . '" method="POST">
                                                            <button type="submit" id="btnNotYetPresent" name="btnNotYetPresent" class="btn btn-app bg-danger">
                                                            <i class="fas fa-times"></i> Not Yet
                                                            </button>
                                                        </form>
                                                        </div>
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
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Presentation</h3>
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
                                                Proposal
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentator
                                            </th>
                                            <th class="text-center align-middle">
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.*
                                    FROM `presentation` A 
                                    INNER JOIN proposal B
                                    USING (id_proposal)
                                    WHERE MONTH(presentation_date) = MONTH(CURRENT_DATE())
                                    AND YEAR(presentation_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowPresentation = $connecting->fetch_assoc()) {
                                                $presentator = $rowPresentation['presentator'];
                                                $presentation_name = $rowPresentation['presentation_name'];
                                                $id_proposal = $rowPresentation['id_proposal'];
                                                $client_name = $rowPresentation['client_name'];
                                                $title = $rowPresentation['proposal_title'];
                                                $target_client = $rowPresentation['target_client'];
                                                $date = $rowPresentation['presentation_date'];
                                                $status = $rowPresentation['presentation_status'];

                                                $presentationDate = date("F d, Y", strtotime($date));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . ' - ' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentator . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentationDate . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $status . '</a>'; ?></td>
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
                                <h3 class="card-title">All Presentation Data</h3>
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
                                                Proposal
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Name
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentator
                                            </th>
                                            <th class="text-center align-middle">
                                                Customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Presentation Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.*
                                    FROM `presentation` A 
                                    INNER JOIN proposal B
                                    USING (id_proposal);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowPresentation = $connecting->fetch_assoc()) {
                                                $presentator = $rowPresentation['presentator'];
                                                $presentation_name = $rowPresentation['presentation_name'];
                                                $id_proposal = $rowPresentation['id_proposal'];
                                                $client_name = $rowPresentation['client_name'];
                                                $title = $rowPresentation['proposal_title'];
                                                $target_client = $rowPresentation['target_client'];
                                                $date = $rowPresentation['presentation_date'];
                                                $status = $rowPresentation['presentation_status'];

                                                $presentationDate = date("F d, Y", strtotime($date));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . ' - ' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentation_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentator . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $client_name . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $presentationDate . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $status . '</a>'; ?></td>
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
                } ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>