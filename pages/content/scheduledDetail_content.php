<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Scheduled Visit</h1>
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
                <!-- Less than 1 month box -->
                <div class="card shadow rounded mx-2 my-2">
                    <div class="card-header">
                        <h3 class="card-title" style="color: GREEN;">Less than 1 month</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($row['level'] == 'Direksi') {
                        ?>
                            <table id="withButton" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 20%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
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
                                    // $searchData = "SELECT * FROM project WHERE visit_schedule='$currentDate'";
                                    // $connecting = mysqli_query($conn, $searchData);
                                    // $rowdata = mysqli_num_rows($connecting);
                                    // if ($rowdata == 0) {
                                    //     echo '<span class="info-box-text">No message found.</span>';
                                    // }
                                    // SQL for data
                                    $searchMsg = "SELECT
                                                P.*,
                                                T.tipe_produk,
                                                C.nama_customer
                                                FROM project P
                                                INNER JOIN client C
                                                    USING (id_client)
                                                INNER JOIN product T
                                                    USING (id_product) 
                                                WHERE visit_schedule BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH) AND visiting_status = 'Waiting for confirm';";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / 86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' || $status == 'No visiting' ? $status : 'There are ' . $dayremaining . ' days left. ';
                                                        echo $status; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <table id="withButton" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Status
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $visitsched = date("Y-m-d", strtotime("+1 months"));
                                    // SQL for data
                                    $searchMsg = "SELECT
                            P.*,
                            T.tipe_produk,
                            C.nama_customer
                            FROM project P
                            INNER JOIN client C
                                USING (id_client)
                            INNER JOIN product T
                                USING (id_product) 
                              WHERE visit_schedule BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH);";
                                    //visit_schedule BETWEEN (CURRENT_DATE - INTERVAL 1 MONTH) AND CURRENT_DATE
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / 86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo 'every ' . $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' ? '' : 'There are ' . $dayremaining . ' days left. ';
                                                        echo $status; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?php
                                                    if ($status == 'Visited') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="../../database/project/next_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <button name="btnNextSchedule" class="btn btn-info">Next Schedule</button>
                                                                </form>
                                                                <br><button class="btn btn-success" disabled>Done</button>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($status == 'Waiting for confirm') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info" disabled>Next Schedule</button>
                                                                <form action="../../database/project/confirm_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <br><button name="btnConfirmSchedule" type="submit" class="btn btn-success">Confirm Schedule</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($status == 'Waiting for schedule') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info" disabled>Next Schedule</button>
                                                                <form action="../../database/project/visited_schedule.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <br><button name="btnVisited" type="submit" class="btn btn-success">Done</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a>No visiting schedule anymore.</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td class="project-actions text-center"><a></a></td> -->
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <!-- More than 1 month box -->
                <div class="card shadow rounded mx-2 my-2">
                    <div class="card-header">
                        <h3 class="card-title" style="color: ORANGE;">More than 1 month</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($row['level'] == 'Direksi') {
                        ?>
                            <table id="withButtonB" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 20%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
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
                                    // $searchData = "SELECT * FROM project WHERE visit_schedule='$currentDate'";
                                    // $connecting = mysqli_query($conn, $searchData);
                                    // $rowdata = mysqli_num_rows($connecting);
                                    // if ($rowdata == 0) {
                                    //     echo '<span class="info-box-text">No message found.</span>';
                                    // }
                                    // SQL for data
                                    $searchMsg = "SELECT
                            P.*,
                            T.tipe_produk,
                            C.nama_customer
                            FROM project P
                            INNER JOIN client C
                                USING (id_client)
                            INNER JOIN product T
                                USING (id_product) 
                                WHERE visit_schedule BETWEEN (CURRENT_DATE - INTERVAL 1 MONTH) AND (CURRENT_DATE+1);";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / -86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' || $status == 'No visiting' ? $status : 'There are ' . $dayremaining . ' days left. ';
                                                        echo $status . ' from Engineer or Administrator'; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <table id="withButtonB" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Status
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $visitsched = date("Y-m-d", strtotime("+1 months"));
                                    // SQL for data
                                    $searchMsg = "SELECT
                            P.*,
                            T.tipe_produk,
                            C.nama_customer
                            FROM project P
                            INNER JOIN client C
                                USING (id_client)
                            INNER JOIN product T
                                USING (id_product) 
                                WHERE visit_schedule BETWEEN (CURRENT_DATE - INTERVAL 1 MONTH) AND (CURRENT_DATE+1);";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / -86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo 'every ' . $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' ? $status : $dayremaining . ' days have passed . Please confirm here if you have done this scheduled visit!'; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?php
                                                    if ($status == 'Visited') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="../../database/project/next_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <button name="btnNextSchedule" class="btn btn-info">Next Schedule</button>
                                                                </form>
                                                                <br><button class="btn btn-success" disabled>Confirm</button>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($status == 'Waiting for confirm') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info" disabled>Next Schedule</button>
                                                                <form action="../../database/project/confirm_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <br><button name="btnConfirmSchedule" type="submit" class="btn btn-success">Confirm Schedule</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($status == 'Waiting for schedule') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info" disabled>Next Schedule</button>
                                                                <form action="../../database/project/visited_schedule.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <br><button name="btnVisited" type="submit" class="btn btn-success">Done</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a>No visiting schedule anymore.</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td class="project-actions text-center"><a></a></td> -->
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <!-- Skipped Call -->
                <div class="card shadow rounded mx-2 mt-2 mb-4">
                    <div class="card-header">
                        <h3 class="card-title" style="color: RED;">Skipped Call</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($row['level'] == 'Direksi') {
                        ?>
                            <table id="withButtonC" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 20%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
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
                                    // SQL for data
                                    $searchMsg = "SELECT
                            P.*,
                            T.tipe_produk,
                            C.nama_customer
                            FROM project P
                            INNER JOIN client C
                                USING (id_client)
                            INNER JOIN product T
                                USING (id_product) 
                                WHERE visit_schedule BETWEEN (CURRENT_DATE - INTERVAL 6 MONTH) AND (CURRENT_DATE+1) AND visiting_status = 'Waiting for confirm';";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / -86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' || $status == 'Waiting for schedule' || $status == 'No visiting' ? $status : $dayremaining . ' days have passed and there is no confirmation from the Engineer or Administrator. '; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <table id="withButtonC" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15%" class="text-center">
                                            Customer Name
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            PIC
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Serial Number
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Install Location
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Schedule
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Visit Frequency
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Status
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $visitsched = date("Y-m-d", strtotime("+1 months"));
                                    // SQL for data
                                    $searchMsg = "SELECT
                            P.*,
                            T.tipe_produk,
                            C.nama_customer
                            FROM project P
                            INNER JOIN client C
                                USING (id_client)
                            INNER JOIN product T
                                USING (id_product) 
                                WHERE visit_schedule BETWEEN (CURRENT_DATE - INTERVAL 6 MONTH) AND (CURRENT_DATE+1);";
                                    $connectionMsg = mysqli_query($conn, $searchMsg);
                                    if ($connectionMsg) {
                                        while ($rowMsg = $connectionMsg->fetch_assoc()) {
                                            $id_project = $rowMsg['id_project'];
                                            $lokasi_pemasangan = $rowMsg['lokasi_pemasangan'];
                                            $visit_schedule = $rowMsg['visit_schedule'];
                                            $warranty_date = $rowMsg['exp_guarantee'];
                                            $sn = $rowMsg['sn'];
                                            $pic = $rowMsg['pic'];
                                            $deskripsi = $rowMsg['deskripsi'];
                                            $nama_customer = $rowMsg['nama_customer'];
                                            $frekuensi = $rowMsg['frekuensi'];
                                            $tipe_produk = $rowMsg['tipe_produk'];
                                            $status = $rowMsg['visiting_status'];

                                            $date = strtotime($visit_schedule);
                                            $remaining = $date - time();
                                            $dayremaining = floor($remaining / -86400);
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
                                                        <?php echo $visit_schedule; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo 'every ' . $frekuensi; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a>
                                                        <?php echo $status == 'Visited' || $status == 'Waiting for schedule' ? $status : $dayremaining . ' days have passed and there is no confirmation from the Engineer or Administrator. '; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <?php
                                                    if ($status == 'Visited') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="../../database/project/next_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <button name="btnNextSchedule" class="btn btn-info">Next Schedule</button>
                                                                </form>
                                                                <br><button class="btn btn-success" disabled>Done</button>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else if ($status == 'Waiting for confirm') {
                                                    ?>
                                                        <form action="../../database/project/confirm_scheduled.php?id=<?php echo $id_project; ?>" method="POST">
                                                            <br><button name="btnConfirmSchedule" type="submit" class="btn btn-success">Confirm Schedule</button>
                                                        </form>
                                                    <?php
                                                    } else if ($status == 'Waiting for schedule') {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info" disabled>Next Schedule</button>
                                                                <form action="../../database/project/visited_schedule.php?id=<?php echo $id_project; ?>" method="POST">
                                                                    <br><button name="btnVisited" type="submit" class="btn btn-success">Done</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a>No visiting schedule anymore.</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td class="project-actions text-center"><a></a></td> -->
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>