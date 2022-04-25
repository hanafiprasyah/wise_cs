<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Maintenance Record</h1>
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
            <div class="row px-2">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Maintenances Table</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="mainReq" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            Maintenance Ticket
                                        </th>
                                        <th class="text-center">
                                            Serial Number
                                        </th>
                                        <th class="text-center">
                                            Reported by
                                        </th>
                                        <th class="text-center">
                                            Engineer
                                        </th>
                                        <th class="text-center">
                                            Submit Date
                                        </th>
                                        <th class="text-center">
                                            Engineer Desc.
                                        </th>
                                        <th class="text-center">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT A.*, P.id_project, P.sn, B.nama_lengkap
                            FROM maintenance_req A 
                            INNER JOIN user B 
                            USING (id_user) 
                            INNER JOIN project P 
                            USING (id_project);";
                                    $connecting = mysqli_query($conn, $sql);
                                    if ($connecting) {
                                        while ($rowReq = $connecting->fetch_assoc()) {
                                            $id_mainreq = $rowReq['id_mainreq'];
                                            $sn      = $rowReq['sn'];
                                            $tiket_request = $rowReq['tiket_request'];
                                            $id_project = $rowReq['id_project'];
                                            $reported_by = $rowReq['reported_by'];
                                            $technician = $rowReq['nama_lengkap'];
                                            $submit_date = $rowReq['req_date'];
                                            $status_req = $rowReq['status_req'];
                                            $tech_desc = $rowReq['tech_description'];
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo '<a href="../screen/mainReq_detail.php?id=' . $tiket_request . '">#WISE-' . $tiket_request . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a href="../screen/project_maintenance.php?id=' . $sn . '">' . $sn . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $reported_by . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $technician . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $submit_date . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $tech_desc . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $status_req . '</a>'; ?></td>
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
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>