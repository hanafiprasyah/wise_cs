<?php
// $id = $_GET['id'];
$id_mainReq = $_GET['id'];
$id_url = mysqli_real_escape_string($conn, $id_mainReq);
$sql = "SELECT 
A.*,
B.nama_customer,
C.sn,
C.lokasi_pemasangan,
C.tgl_pemasangan,
C.visit_schedule,
C.exp_guarantee,
C.pic
    FROM maintenance_req A 
    INNER JOIN client B 
    USING (id_client) 
    INNER JOIN project C 
    USING (id_project) WHERE tiket_request='" . $id_url . "';";

$resultID = mysqli_query($conn, $sql);
$rowDatas = mysqli_fetch_array($resultID);

$curDate1 = $rowDatas['req_date'];
$req_date = date("D, d F Y", strtotime($curDate1));
$reported_by = $rowDatas['reported_by'];
$status = $rowDatas['status_req'];
$id_mainReq = $rowDatas['id_mainreq'];
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Maintenance Detail</h1>
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
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card" id="printableArea">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-info">Request Date</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $req_date; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-success">Reported by</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $reported_by; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-warning">Request Status</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $status; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <h4>Maintenance Timeline</h4>
                                        <br />
                                        <div class="text-muted">
                                            <!-- <p class="text-sm">
                                        <b class="d-block">Request Status</b>
                                        <small>Updated by : Engineer Name</small>
                                    </p> -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Updating Date</th>
                                                                <th class="text-center align-middle">Updated by</th>
                                                                <th class="text-center align-middle">Status</th>
                                                                <th class="text-center align-middle">Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <input type="hidden" value="<?php echo $id_mainreq; ?>" name="id_mainreq" id="id_mainreq">
                                                            <?php
                                                            $sqlNewTimeline = $conn->query("SELECT * FROM `maintenance_timeline` WHERE id_mainreq='" . $id_mainReq . "'");
                                                            while ($rowDataTimeline = mysqli_fetch_array($sqlNewTimeline)) {
                                                                $updating_date = $rowDataTimeline['updating_date'];
                                                                $updated_by    = $rowDataTimeline['updated_by'];
                                                                $status        = $rowDataTimeline['status_update'];
                                                                $timeline_desc = $rowDataTimeline['timeline_desc'];
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center align-middle"><?php echo $updating_date; ?></td>
                                                                    <td class="text-center align-middle"><?php echo $updated_by; ?></td>
                                                                    <td class="text-center align-middle"><?php echo $status; ?></td>
                                                                    <td class="text-center align-middle"><?php echo $timeline_desc; ?></td>
                                                                </tr>

                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <br>
                                <h5>Serial Number : </h5>
                                <h3 class="text-primary"><i class="fa fa-archive"><br /></i> <?php echo $rowDatas['sn']; ?></h3><br>
                                <h5>Maintenance Description : </h5>
                                <p class="text-muted"><?php echo $rowDatas['tech_description']; ?></p>
                                <br>
                                <div class="text-muted">
                                    <p class="text-sm">Company
                                        <b class="d-block"><?php echo $rowDatas['nama_customer']; ?></b>
                                    </p>
                                </div>
                                <div class="text-center mt-5 mb-3">
                                    <?php
                                    if ($row['level'] != 'Direksi') {
                                    ?>
                                        <!-- UPDATE TIMELINE -->
                                        <form method="POST" action="../../database/mainreq/update_timeline.php?id=<?php echo $rowDatas['id_mainreq']; ?>">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" value="<?php echo $row['nama_lengkap']; ?>" name="updated_by" id="updated_by">
                                                    <input type="hidden" value="<?php echo $rowDatas['tiket_request']; ?>" name="tiket_request" id="tiket_request">
                                                    <p class="text-sm">Update Progress</p>
                                                    <textarea id="timeline_desc" name="timeline_desc" class="md-textarea form-control" rows="3" required></textarea>
                                                    <br>
                                                    <select name="status_req" id="status_req" class="form-control select2bs4" required>
                                                        <option value="">Status</option>
                                                        <option value="Solved">Solved</option>
                                                        <option value="Waiting for sparepart">Waiting for sparepart</option>
                                                        <option value="Sending unit to factory">Sending unit to factory</option>
                                                        <option value="Need to replace unit">Need to replace unit</option>
                                                    </select><br>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="btnUpdateTimeline" id="btnUpdateTimeline" class="btn btn-success"><i class="fas fa-save"></i> &nbsp Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <button class="btn btn-info" onclick="printMainReq()" type="submit"> <i class="fa fa-print"></i> Print</button>
                                    <?php
                                    if ($row['level'] == 'Administrator' || $row['level'] == 'Direksi') {
                                    ?>
                                        <button class="btn btn-danger" onclick="removeReq()" type="submit"> <i class="fas fa-trash"></i> Remove</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->