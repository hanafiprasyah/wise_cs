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
                    <h3 class="m-0">Proposal</h3>
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
                        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseAddProposal" role="button" aria-expanded="false" aria-controls="collapseAddProposal">
                            <i class="fas fa-plus"></i> &nbsp Add New Proposal
                        </a>
                    </div>
                    <!-- ADD NEW -->
                    <div class="col-md-12 collapse" id="collapseAddProposal">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <!-- <h3 class="card-title">Add New Proposal</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div> -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form id="proposalForm" class="form-horizontal" action="../../database/proposal/add_proposal.php" method="POST">
                                            <div class="form-group row">
                                                <label for="id_proposal" class="col-sm-4 col-form-label">Entry by</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="id_proposal" name="id_proposal" placeholder="Fill with your SIMPLE NAME!" required>
                                                    <span style="color: BLUE;">Example : <a style="color: RED;">H</a>anafi (Using CAPITAL in the first row of your name)</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="proposal_title" class="col-sm-4 col-form-label">Proposal Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="proposal_title" name="proposal_title" placeholder="What is the title?" required>
                                                    <span style="color: BLUE;">Example : PROPOSAL ETS</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="target_client" class="col-sm-4 col-form-label">Pre-Customer</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="target_client" name="target_client" placeholder="Who is your pre-customer?" required>
                                                    <span style="color: BLUE;">Example : PT. WIBAWA SOLUSI ELEKTRIK</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="submit_date" class="col-sm-4 col-form-label">Submit Date</label>
                                                <div class="col-sm-6 input-group date" id="submit_date" data-target-input="nearest">
                                                    <input type="text" name="submit_date" id="submit_date" class="form-control datetimepicker-input" data-target="#submit_date" placeholder="Select the date" required />
                                                    <div class="input-group-append" data-target="#submit_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-2">
                                                    <button type="submit" name="btnAddProposal" class="btn btn-block btn-success">Add</button>
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
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Proposal</h3>
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
                                                Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Pre-customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Proposal Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *
                                            FROM proposal
                                            WHERE MONTH(submit_date) = MONTH(CURRENT_DATE())
                                            AND YEAR(submit_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowProposal = $connecting->fetch_assoc()) {
                                                $id_proposal = $rowProposal['id_proposal'];
                                                $title = $rowProposal['proposal_title'];
                                                $target_client = $rowProposal['target_client'];
                                                $submit = $rowProposal['submit_date'];
                                                $status = $rowProposal['proposal_status'];

                                                $submitDate = date("F d, Y", strtotime($submit));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $submitDate . '</a>'; ?></td>
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
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Proposal Data</h3>
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
                                                Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Pre-customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Proposal Status
                                            </th>
                                            <th class="text-center align-middle">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *
                                                FROM proposal;";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowProposal = $connecting->fetch_assoc()) {
                                                $id_proposal = $rowProposal['id_proposal'];
                                                $title = $rowProposal['proposal_title'];
                                                $target_client = $rowProposal['target_client'];
                                                $submit = $rowProposal['submit_date'];
                                                $status = $rowProposal['proposal_status'];

                                                $submitDate = date("F d, Y", strtotime($submit));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $submitDate . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $status . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '
                                                    <div class="row">
                                                        <form action="../../database/proposal/edit_accepted.php?id=' . $id_proposal . '" method="POST">
                                                            <button type="submit" id="btnAcceptedProposal" name="btnAcceptedProposal" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Accepted
                                                            </button>
                                                        </form>
                                                        <form action="../../database/proposal/edit_rejected.php?id=' . $id_proposal . '" method="POST">
                                                            <button type="submit" id="btnRejectedProposal" name="btnRejectedProposal" class="btn btn-app bg-danger">
                                                            <i class="fas fa-times"></i> Rejected
                                                            </button>
                                                        </form>
                                                        <form action="../../database/proposal/edit_delayed.php?id=' . $id_proposal . '" method="POST">
                                                            <button type="submit" id="btnDelayedProposal" name="btnDelayedProposal" class="btn btn-app bg-warning">
                                                            <i class="fas fa-clock"></i> Delayed
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
                } else { ?>
                    <!-- MONTHLY -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Proposal</h3>
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
                                                Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Pre-customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *
                            FROM proposal
                            WHERE MONTH(submit_date) = MONTH(CURRENT_DATE())
                            AND YEAR(submit_date) = YEAR(CURRENT_DATE());";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowProposal = $connecting->fetch_assoc()) {
                                                $id_proposal = $rowProposal['id_proposal'];
                                                $title = $rowProposal['proposal_title'];
                                                $target_client = $rowProposal['target_client'];
                                                $submit = $rowProposal['submit_date'];
                                                $status = $rowProposal['proposal_status'];

                                                $submitDate = date("F d, Y", strtotime($submit));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $submitDate . '</a>'; ?></td>
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
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">All Proposal Data</h3>
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
                                                Title
                                            </th>
                                            <th class="text-center align-middle">
                                                Pre-customer
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Date
                                            </th>
                                            <th class="text-center align-middle">
                                                Submit Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *
                            FROM proposal;";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowProposal = $connecting->fetch_assoc()) {
                                                $id_proposal = $rowProposal['id_proposal'];
                                                $title = $rowProposal['proposal_title'];
                                                $target_client = $rowProposal['target_client'];
                                                $submit = $rowProposal['submit_date'];
                                                $status = $rowProposal['proposal_status'];

                                                $submitDate = date("F d, Y", strtotime($submit));
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $title . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $target_client . '</a>'; ?></td>
                                                    <td class="text-center align-middle"><?php echo '<a>' . $submitDate . '</a>'; ?></td>
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
                }
                ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>