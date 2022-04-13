<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Warranty Data</h1>
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
            <!-- < 1 Month Running Out Warranty -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: GREEN;">
                            Less than 1 month</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                    if ($row['level'] == 'Direksi') {
                    ?>
                        <div class="card-body">
                            <table id="withButton" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            P.I.C.
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Phone Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Date
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $currentDate = date("Y-m-d");
                                    $trimDate = date("Y-m-d", strtotime($currentDate . "+1 months"));

                                    // SQL for data
                                    $searchMsg = "SELECT
                                            P.*,
                                            C.nama_customer
                                            FROM project P
                                            INNER JOIN client C
                                            USING (id_client) 
                                            WHERE exp_guarantee BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH) AND exp_status = 'Continues';";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $notel = $rowMsg['notel'];
                                            $tgl_pemasangan = $rowMsg['tgl_pemasangan'];
                                            $exp_status = $rowMsg['exp_status'];
                                            $insDate = date("d-m-Y", strtotime($tgl_pemasangan));
                                            $nama_customer = $rowMsg['nama_customer'];
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <!-- Customer Name -->
                                                        <?php echo $nama_customer; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $pic; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $notel; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $sn; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $lokasi_pemasangan; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $insDate; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $exp_status; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card-body">
                            <table id="withButton" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Date
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Status
                                        </th>
                                        <th style="width: 20%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $currentDate = date("Y-m-d");
                                    $trimDate = date("Y-m-d", strtotime($currentDate . "+1 months"));
                                    // SQL for data
                                    $searchMsg = "SELECT
                                            P.*,
                                            C.nama_customer
                                            FROM project P
                                            INNER JOIN client C
                                            USING (id_client)
                                            WHERE exp_guarantee BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH) AND exp_status = 'Continues';";
                                    // WHERE visit_schedule BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH);
                                    // WHERE exp_guarantee='$trimDate';
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $id_project = $rowMsg['id_project'];
                                            $sn = $rowMsg['sn'];
                                            $exp_status = $rowMsg['exp_status'];
                                            $pic = $rowMsg['pic'];
                                            $tgl_pemasangan = $rowMsg['tgl_pemasangan'];
                                            $insDate = date("d-m-Y", strtotime($tgl_pemasangan));
                                            $nama_customer = $rowMsg['nama_customer'];
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <!-- Customer Name -->
                                                        <?php echo $nama_customer; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $sn; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $lokasi_pemasangan; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $insDate; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $exp_status; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="../../database/project/continues_warranty.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <button name="btnAddWarranty" class="btn btn-info">Add Warranty</button>
                                                                </form>
                                                                <br>
                                                                <form action="../../database/project/stop_warranty.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <button name="btnStopWarranty" class="btn btn-danger">Stop Warranty</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Exp Warranty -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: ORANGE;">Expired Warranty</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="withButtonB" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20%" class="text-center">
                                        Customer Name
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        PIC
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Phone Number
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Serial Number
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Install Date
                                    </th>
                                    <th style="width: 15%" class="text-center">
                                        Expired Date
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                $currentDate = date("Y-m-d");
                                // $trimDate = date("Y-m-d", strtotime($currentDate . "+1 months"));
                                // $searchData = "SELECT * FROM `project` WHERE exp_guarantee='$trimDate';";
                                // $connecting = mysqli_query($conn, $searchData);
                                // $rowdata = mysqli_num_rows($connecting);
                                // if ($rowdata == 0) {
                                //     echo '<span class="info-box-text">No data found.</span>';
                                // } 

                                // SQL for data
                                $searchMsg = "SELECT
                        P.*, 
                        C.nama_customer
                        FROM project P
                        INNER JOIN client C
                          USING (id_client) 
                          WHERE exp_guarantee < CURRENT_DATE AND exp_status = 'Stopped';";
                                $connectionMsg = mysqli_query($conn, $searchMsg);
                                if ($connectionMsg) {
                                    while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                        $id_project = $rowMsg['id_project'];
                                        $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                        $sn = $rowMsg['sn'];
                                        $notel = $rowMsg['notel'];
                                        $pic = $rowMsg['pic'];
                                        $tgl_pemasangan = $rowMsg['tgl_pemasangan'];
                                        $insDate = date("d-m-Y", strtotime($tgl_pemasangan));
                                        $nama_customer = $rowMsg['nama_customer'];
                                        $expDate = $rowMsg['exp_guarantee'];
                                ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <!-- Customer Name -->
                                                    <?php echo $nama_customer; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <?php echo $pic; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <?php echo $notel; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <?php echo $sn; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <?php echo $insDate; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a>
                                                    <?php echo $expDate; ?>
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="../../database/project/continues_warranty.php?id=<?php echo $id_project; ?>" method="POST">
                                                    <div class="form-group row">
                                                        <label for="tambah_garansi" class="col-sm-12 col-form-label">Add Warranty</label><br>
                                                        <div class="col-sm-12">
                                                            <select name="tambah_garansi" id="tambah_garansi" class="form-control select2bs4" style="width: 100%;" required>
                                                                <option value="1">1 Years</option>
                                                                <option value="2">2 Years</option>
                                                                <option value="3">3 Years</option>
                                                                <option value="4">4 Years</option>
                                                                <option value="5">5 Years</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <button type="submit" name="btnAddWarranty" class="btn btn-info">Add Warranty</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>