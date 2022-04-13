<?php
if ($row['level'] != 'Teknisi') {
?>
    <!-- ADD NEW -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Add New Purchase Order</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" action="../../database/po/add_po.php" method="POST">
                            <div class="form-group row">
                                <label for="id_po" class="col-sm-4 col-form-label">Entry by</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="id_po" name="id_po" placeholder="Fill with your SIMPLE NAME!" required>
                                    <span style="color: BLUE;">Example : <a style="color: RED;">H</a>anafi (Using CAPITAL in the first row of your name)</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_quotation" class="col-sm-4 col-form-label">Survey Report</label>
                                <div class="col-sm-4">
                                    <select name="id_quotation" id="id_quotation" class="form-control select2bs4" required>
                                        <option value="">Select Report Title</option>
                                        <?php
                                        $getQuo = "SELECT A.*, B.report_title FROM `quotation` A
                                                        INNER JOIN report B
                                                        USING (id_report)
                                                        WHERE quotation_status = 'Success';";
                                        $connectQuo = mysqli_query($conn, $getQuo);
                                        while ($rowQuo = mysqli_fetch_array($connectQuo)) {
                                        ?>
                                            <option value="<?php echo $rowQuo['id_quotation']; ?>" <?php if ($rowQuo['report_title'] == $rowQuo['id_quotation']) echo 'selected="selected"'; ?>><?php echo $rowQuo['report_title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_client" class="col-sm-4 col-form-label">Customer</label>
                                <div class="col-sm-4">
                                    <select name="id_client" id="id_client" class="form-control select2bs4" required>
                                        <option value="">Select Customer</option>
                                        <?php
                                        $getIdClient = "SELECT * FROM `client`;";
                                        $connectIdClient = mysqli_query($conn, $getIdClient);
                                        while ($rowIdClient = mysqli_fetch_array($connectIdClient)) {
                                        ?>
                                            <option value="<?php echo $rowIdClient['id_client']; ?>" <?php if ($rowIdClient['nama_customer'] == $rowIdClient['id_client']) echo 'selected="selected"'; ?>><?php echo $rowIdClient['nama_customer']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: BLUE;">Can not find your customer name?<a style="color: RED;" href="../screen/add_client.php?id=102002"> Add new customer here!</a></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="po_created" class="col-sm-4 col-form-label">PO Created</label>
                                <div class="col-sm-6 input-group date" id="po_created" data-target-input="nearest">
                                    <input type="text" name="po_created" id="po_created" class="form-control datetimepicker-input" data-target="#po_created" placeholder="Select the date" required />
                                    <div class="input-group-append" data-target="#po_created" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" name="btnAddPO" class="btn btn-success">Save Order</button>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p><?php echo $_GET['error']; ?></p>
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
                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Purchase Order</h3>
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
                                PO Ticket
                            </th>
                            <th class="text-center align-middle">
                                Customer
                            </th>
                            <th class="text-center align-middle">
                                Order at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_customer FROM `purchase_order` A
                                    INNER JOIN client B
                                    USING (id_client)
                            WHERE MONTH(po_date) = MONTH(CURRENT_DATE())
                            AND YEAR(po_date) = YEAR(CURRENT_DATE());";
                        $connectMonthly = mysqli_query($conn, $sql);
                        if ($connectMonthly) {
                            while ($rowDataMonthly = $connectMonthly->fetch_assoc()) {
                                $id_po = $rowDataMonthly['id_po'];
                                $id_quotation = $rowDataMonthly['id_quotation'];
                                $nama_customer = $rowDataMonthly['nama_customer'];
                                $po_status = $rowDataMonthly['po_status'];
                                $po = $rowDataMonthly['po_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a>' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_customer . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_status . '</a>'; ?></td>
                                </tr>
                        <?php
                            }
                            $connectMonthly->free();
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
                <h3 class="card-title">All Purchase Order Data</h3>
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
                                PO Ticket
                            </th>
                            <th class="text-center align-middle">
                                Customer
                            </th>
                            <th class="text-center align-middle">
                                Order at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                            <th class="text-center align-middle">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_customer FROM `purchase_order` A
                                    INNER JOIN client B
                                    USING (id_client);";
                        $connecting = mysqli_query($conn, $sql);
                        if ($connecting) {
                            while ($rowAll = $connecting->fetch_assoc()) {
                                $id_po = $rowAll['id_po'];
                                $id_quotation = $rowAll['id_quotation'];
                                $nama_customer = $rowAll['nama_customer'];
                                $po_status = $rowAll['po_status'];
                                $po = $rowAll['po_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a>' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_customer . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_status . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '
                                                    <div class="row">
                                                        <form action="../../database/po/edit_waitingDP.php?id=' . $id_po . '" method="POST">
                                                            <button type="submit" id="btnWFD" name="btnWFD" class="btn btn-app bg-success">
                                                            <i class="fas fa-check"></i> Waiting for DP
                                                            </button>
                                                        </form>
                                                        <form action="../../database/po/edit_progress.php?id=' . $id_po . '" method="POST">
                                                            <button type="submit" id="btnOnProgress" name="btnOnProgress" class="btn btn-app bg-warning">
                                                            <i class="fas fa-clock"></i> On Progress
                                                            </button>
                                                        </form>
                                                        <form action="../../database/po/edit_deliver.php?id=' . $id_po . '" method="POST">
                                                            <button type="submit" id="btnDeliver" name="btnDeliver" class="btn btn-app bg-info">
                                                            <i class="fas fa-truck"></i></i> Ready to Deliver
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
                <h3 class="card-title">Our <i style="color: RED;"><?php echo $monthName; ?></i> Purchase Order</h3>
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
                                PO Ticket
                            </th>
                            <th class="text-center align-middle">
                                Customer
                            </th>
                            <th class="text-center align-middle">
                                Order at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_customer FROM `purchase_order` A
                                    INNER JOIN client B
                                    USING (id_client)
                            WHERE MONTH(po_date) = MONTH(CURRENT_DATE())
                            AND YEAR(po_date) = YEAR(CURRENT_DATE());";
                        $connectMonthly = mysqli_query($conn, $sql);
                        if ($connectMonthly) {
                            while ($rowDataMonthly = $connectMonthly->fetch_assoc()) {
                                $id_po = $rowDataMonthly['id_po'];
                                $id_quotation = $rowDataMonthly['id_quotation'];
                                $nama_customer = $rowDataMonthly['nama_customer'];
                                $po_status = $rowDataMonthly['po_status'];
                                $po = $rowDataMonthly['po_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a>' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_customer . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_status . '</a>'; ?></td>
                                </tr>
                        <?php
                            }
                            $connectMonthly->free();
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
                <h3 class="card-title">All Purchase Order Data</h3>
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
                                PO Ticket
                            </th>
                            <th class="text-center align-middle">
                                Customer
                            </th>
                            <th class="text-center align-middle">
                                Order at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_customer FROM `purchase_order` A
                                    INNER JOIN client B
                                    USING (id_client);";
                        $connecting = mysqli_query($conn, $sql);
                        if ($connecting) {
                            while ($rowAll = $connecting->fetch_assoc()) {
                                $id_po = $rowAll['id_po'];
                                $id_quotation = $rowAll['id_quotation'];
                                $nama_customer = $rowAll['nama_customer'];
                                $po_status = $rowAll['po_status'];
                                $po = $rowAll['po_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a>' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_customer . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_status . '</a>'; ?></td>
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