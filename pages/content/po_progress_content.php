<?php
$monthName = date("F");
$year  = date("Y");
$id_user = $row['id_user'];

$id_po = $_GET['id'];
$po = mysqli_real_escape_string($conn, $id_po);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0"><?php echo 'PO Details of #' . $po; ?></h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Principal</li>
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
                <!-- ALL DATA -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Data Table</h3>
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
                                            PO Number
                                        </th>
                                        <th class="text-center align-middle">
                                            Entry by
                                        </th>
                                        <th class="text-center align-middle">
                                            PO Date
                                        </th>
                                        <th class="text-center align-middle">
                                            Sending at
                                        </th>
                                        <th class="text-center align-middle">
                                            Product
                                        </th>
                                        <th class="text-center align-middle">
                                            Qty
                                        </th>
                                        <th class="text-center align-middle">
                                            Delivery Target
                                        </th>
                                        <th class="text-center align-middle">
                                            Progress
                                        </th>
                                        <th class="text-center align-middle">
                                            Status
                                        </th>
                                        <th class="text-center align-middle">
                                            Description
                                        </th>
                                        <th class="text-center align-middle">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT A.*, B.* FROM purchase_order A
                                    INNER JOIN product B
                                    USING (id_product) WHERE po_number='" . $po . "';";
                                    $connecting = mysqli_query($conn, $sql);
                                    if ($connecting) {
                                        while ($rowDataPODetail = $connecting->fetch_assoc()) {
                                            $po_number          = $rowDataPODetail['po_number'];
                                            $entry_by           = $rowDataPODetail['entry_by'];
                                            $po_date            = $rowDataPODetail['po_date'];
                                            $sending_date       = $rowDataPODetail['sending_date'];
                                            $tipe_produk        = $rowDataPODetail['tipe_produk'];
                                            $item_qty           = $rowDataPODetail['item_qty'];
                                            $delivery_target    = $rowDataPODetail['delivery_target'];
                                            $progress           = $rowDataPODetail['progress'];
                                            $detail_progress    = $rowDataPODetail['detail_progress'];
                                            $po_desc            = $rowDataPODetail['po_desc'];

                                            $sendDate   = date("F d, Y", strtotime($sending_date));
                                            $POdate_format = date("F d, Y", strtotime($po_date));
                                            $targetDate = date("F d, Y", strtotime($delivery_target));
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo '<a>' . $po_number . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $entry_by . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $POdate_format . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $sendDate . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $tipe_produk . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $item_qty . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $targetDate . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <label for="progress"><?php echo round($progress, 2) . '%'; ?></label>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $detail_progress . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $po_desc . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php
                                                    if ($detail_progress == 'RECEIVED') {
                                                        echo '
                                                    <form action="../../database/po/update_progress.php?id=' . $po_number . '&by=' . $id_user . '&cs=' . $detail_progress . '" method="POST">
                                                        <button type="submit" name="btnUpdateProgressPrincipal" id="btnUpdateProgressPrincipal" class="btn btn-success" disabled>Update Progress</button>
                                                    </form>
                                                    ';
                                                    } else if ($detail_progress == 'DELIVERY' || $detail_progress == 'CASING ORDER') {
                                                        echo '
                                                        <div class="row">
                                                            <div class="column">
                                                                <div class="col-md-12">
                                                                    <form action="../../database/po/update_progress.php?id=' . $po_number . '&by=' . $id_user . '&cs=' . $detail_progress . '" method="POST">
                                                                        <button type="submit" name="btnUpdateProgressPrincipal" id="btnUpdateProgressPrincipal" class="btn btn-success">Upgrade Progress</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="column">
                                                                <div class="col-md-12">
                                                                    <form method="POST">
                                                                        <button type="submit" name="btnUpdateProgressPrincipal" id="btnUpdateProgressPrincipal" class="btn btn-warning" disabled>Downgrade Progress</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        ';
                                                    } else {
                                                        echo '
                                                        <div class="row">
                                                            <div class="column">
                                                                <div class="col-md-12">
                                                                    <form action="../../database/po/update_progress.php?id=' . $po_number . '&by=' . $id_user . '&cs=' . $detail_progress . '" method="POST">
                                                                        <button type="submit" name="btnUpdateProgressPrincipal" id="btnUpdateProgressPrincipal" class="btn btn-success">Upgrade Progress</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="column">
                                                                <div class="col-md-12">
                                                                    <form action="../../database/po/downgrade_progress.php?id=' . $po_number . '&by=' . $id_user . '&cs=' . $detail_progress . '" method="POST">
                                                                        <button type="submit" name="btnUpdateProgressPrincipal" id="btnUpdateProgressPrincipal" class="btn btn-warning">Downgrade Progress</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ';
                                                    }
                                                    ?>
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
            </div>
            <!-- UPDATE LOG VIEW -->
            <div class="row">
                <div class="col-12" id="accordion">
                    <!-- UI for showing list -->
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#row<?php echo $po; ?>">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    UPDATE LOG <br />
                                    PO Number : <?php echo $po; ?>
                                </h4>
                            </div>
                        </a>
                        <div id="row<?php echo $po; ?>" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <div class="timeline">
                                            <!-- while here -->
                                            <?php
                                            $dataUpdated2  = $conn->query("SELECT A.*, B.nama_lengkap, C.detail_progress FROM `po_track` A
                                            INNER JOIN user B
                                            USING (id_user)
                                            INNER JOIN purchase_order C
                                            USING (po_number)
                                            WHERE po_number = '" . $po . "';");

                                            while ($rowDataUpdated2 = mysqli_fetch_array($dataUpdated2)) {
                                                $updated_date               = $rowDataUpdated2['updated_date'];
                                                $nama_lengkap               = $rowDataUpdated2['nama_lengkap'];
                                                $last_stat                  = $rowDataUpdated2['cur_stat'];

                                                // Format the date
                                                $newDate1                    = date("F d, Y", strtotime($updated_date));
                                                $newDate2                    = date("F d, Y / H:i:s", strtotime($updated_date));
                                            ?>
                                                <div class="time-label">
                                                    <span class="bg-red"><?php echo $newDate1; ?></span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-handshake bg-blue"></i>
                                                    <i class="fas fa-angle-double-right bg-blue"></i>
                                                    <div class="timeline-item">
                                                        <?php
                                                        $dateUpdate             = strtotime($updated_date);
                                                        $remaining1             = $dateUpdate - time();
                                                        $dateCount              = floor($remaining1 / 86400);
                                                        ?>
                                                        <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $dateCount == 0 ? 'Today' : $dateCount . ' days ago'; ?></span>
                                                        <h3 class="timeline-header">Updated by : <b><?php echo $nama_lengkap; ?></b></h3>
                                                        <h3 class="timeline-header">Updated at : <?php echo $newDate2; ?></h3>
                                                        <h3 class="timeline-header">Last Status : <i><?php echo $last_stat; ?></i></h3>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- end while here -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>