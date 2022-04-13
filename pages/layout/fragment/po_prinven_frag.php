<?php
if ($row['level'] != 'Teknisi') {
?>
    <div class="col-md-4 mb-4">
        <span class="badge badge-danger">New</span>
        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapsePO" role="button" aria-expanded="false" aria-controls="collapsePO">
            <i class="fas fa-plus"></i> &nbsp Add New PO
        </a>
    </div>
    <!-- ADD NEW -->
    <div class="col-md-12 collapse" id="collapsePO">
        <div class="card">
            <div class="card-header border-transparent">
                <!-- <h3 class="card-title">Add New Purchase Order</h3>
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
                        <form class="form-horizontal" action="../../database/po/add_po.php?user=<?php echo $row['nama_lengkap']; ?>" method="POST">
                            <div class="form-group row">
                                <label for="po_number" class="col-sm-4 col-form-label">PO Query</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="po_number" name="po_number" placeholder="PO Query" required>
                                    <?php
                                    $sqlCheckLast = $conn->query("SELECT * FROM purchase_order ORDER BY po_number DESC LIMIT 1");
                                    while ($rowLastPO = mysqli_fetch_assoc($sqlCheckLast)) {
                                        $po_last = $rowLastPO['po_number'];
                                    }
                                    ?>
                                    <span style="color: GRAY;">Last Query was : <?php echo $po_last == '' ? 'Empty' : $po_last; ?></span><br />
                                    <span style="color: BLUE;">Example : WISE-<a style="color: RED;">PO18-001</a> (Input start from red text)</span>
                                </div>
                            </div>
                            <!--<div class="form-group row">-->
                            <!--    <label for="entry_by" class="col-sm-4 col-form-label">Entry by</label>-->
                            <!--    <div class="col-sm-6">-->
                            <!--        <input type="text" class="form-control" id="entry_by" name="entry_by" placeholder="Fill with your SIMPLE NAME!" required>-->
                            <!--        <span style="color: BLUE;">Example : <a style="color: RED;">H</a>anafi (Using CAPITAL in the first row of your name)</span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="form-group row">
                                <label for="id_quotation" class="col-sm-4 col-form-label">Quotation ID</label>
                                <div class="col-sm-4">
                                    <select name="id_quotation" id="id_quotation" class="form-control select2bs4" required>
                                        <option value="">Select Successful Quotation</option>
                                        <?php
                                        $getQuo = "SELECT * FROM quotation WHERE quotation_status='Success';";
                                        $connectQuo = mysqli_query($conn, $getQuo);
                                        while ($rowQuo = mysqli_fetch_array($connectQuo)) {
                                        ?>
                                            <option value="<?php echo $rowQuo['id_quotation']; ?>" <?php if ($rowQuo['value'] == $rowQuo['id_quotation']) echo 'selected="selected"'; ?>><?php echo $rowQuo['id_quotation']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_rel" class="col-sm-4 col-form-label">Principal/Vendor</label>
                                <div class="col-sm-4">
                                    <select name="id_rel" id="id_rel" class="form-control select2bs4" required>
                                        <option value="">Select Relation</option>
                                        <?php
                                        $getRelID    = "SELECT * FROM `po_relation` WHERE status_rel='ENABLED' ORDER BY nama_rel ASC;";
                                        $connRelID   = mysqli_query($conn, $getRelID);
                                        while ($rowRel = mysqli_fetch_array($connRelID)) {
                                        ?>
                                            <option value="<?php echo $rowRel['id_rel']; ?>" <?php if ($rowRel['nama_rel'] == $rowRel['id_rel']) echo 'selected="selected"'; ?>><?php echo $rowRel['nama_rel']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_product" class="col-sm-4 col-form-label">Product</label>
                                <div class="col-sm-4">
                                    <select name="id_product" id="id_product" class="form-control select2bs4" required>
                                        <option value="">Select Product</option>
                                        <?php
                                        $getProduct  = "SELECT * FROM product ORDER BY tipe_produk ASC;";
                                        $connProduct = mysqli_query($conn, $getProduct);
                                        while ($rowProduct = mysqli_fetch_array($connProduct)) {
                                        ?>
                                            <option value="<?php echo $rowProduct['id_product']; ?>" <?php if ($rowProduct['tipe_produk'] == $rowProduct['id_product']) echo 'selected="selected"'; ?>><?php echo $rowProduct['tipe_produk']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="item_qty" class="col-sm-4 col-form-label">Item Quantity</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="item_qty" name="item_qty" placeholder="Qty" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="po_date" class="col-sm-4 col-form-label">PO Date</label>
                                <div class="col-sm-6 input-group date" id="po_created" data-target-input="nearest">
                                    <input type="text" name="po_date" id="po_date" class="form-control datetimepicker-input" data-target="#po_created" placeholder="Select the date" required />
                                    <div class="input-group-append" data-target="#po_created" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="delivery_target" class="col-sm-4 col-form-label">Max. Delivery Target</label>
                                <div class="col-sm-6 input-group date" id="delivery_target" data-target-input="nearest">
                                    <input type="text" name="delivery_target" id="delivery_target" class="form-control datetimepicker-input" data-target="#delivery_target" placeholder="Select the date" required />
                                    <div class="input-group-append" data-target="#delivery_target" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sending_date" class="col-sm-4 col-form-label">PO Sending Date</label>
                                <div class="col-sm-6 input-group date" id="sending_date" data-target-input="nearest">
                                    <input type="text" name="sending_date" id="sending_date" class="form-control datetimepicker-input" data-target="#sending_date" placeholder="Select the date" required />
                                    <div class="input-group-append" data-target="#sending_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="po_desc" class="col-sm-4 col-form-label">PO Description</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="po_desc" name="po_desc" placeholder="Optional!">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail_progress" class="col-sm-4 col-form-label">Detail Progress</label>
                                <div class="col-sm-4">
                                    <select name="detail_progress" id="detail_progress" class="form-control select2bs4" required>
                                        <option value="">Select Detail Progress</option>
                                        <option value="CASING ORDER">CASING ORDER</option>
                                        <!--<option value="ENGINE ASSEMBLY">ENGINE ASSEMBLY</option>-->
                                        <!--<option value="CABLING">CABLING</option>-->
                                        <!--<option value="TESTING">TESTING</option>-->
                                        <!--<option value="LABELING AND PACKAGING">LABELING AND PACKAGING</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="po_status" class="col-sm-4 col-form-label">PO Status</label>
                                <div class="col-sm-4">
                                    <select name="po_status" id="po_status" class="form-control select2bs4" required>
                                        <option value="">Select Status</option>
                                        <option value="Waiting for DP">Waiting for DP</option>
                                        <option value="On Progress of Production">On Progress of Production</option>
                                        <option value="Ready to Deliver">Ready to Deliver</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-2">
                                    <button type="submit" name="btnAddPO" class="btn btn-block btn-success">Save Order</button>
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
                                PO Number
                            </th>
                            <th class="text-center align-middle">
                                Entry by
                            </th>
                            <th class="text-center align-middle">
                                Principal/Vendor
                            </th>
                            <th class="text-center align-middle">
                                PO Date
                            </th>
                            <th class="text-center align-middle">
                                Sending at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_rel FROM `purchase_order` A
                                    INNER JOIN po_relation B
                                    USING (id_rel)
                            WHERE MONTH(po_date) = MONTH(CURRENT_DATE())
                            AND YEAR(po_date) = YEAR(CURRENT_DATE());";
                        $connectMonthly = mysqli_query($conn, $sql);
                        if ($connectMonthly) {
                            while ($rowDataMonthly = $connectMonthly->fetch_assoc()) {
                                $id_po = $rowDataMonthly['po_number'];
                                $entry_by = $rowDataMonthly['entry_by'];
                                $id_quotation = $rowDataMonthly['id_quotation'];
                                $nama_rel = $rowDataMonthly['nama_rel'];
                                $po_status = $rowDataMonthly['po_status'];
                                $po = $rowDataMonthly['po_date'];
                                $sending = $rowDataMonthly['sending_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a href="../screen/po_progress.php?id=' . $id_po . '">' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $entry_by . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_rel . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $sending . '</a>'; ?></td>
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
                                PO Number
                            </th>
                            <th class="text-center align-middle">
                                Entry by
                            </th>
                            <th class="text-center align-middle">
                                Principal/Vendor
                            </th>
                            <th class="text-center align-middle">
                                PO Date
                            </th>
                            <th class="text-center align-middle">
                                Sending at
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
                        $sql = "SELECT A.*, B.nama_rel FROM `purchase_order` A
                                    INNER JOIN po_relation B
                                    USING (id_rel);";
                        $connecting = mysqli_query($conn, $sql);
                        if ($connecting) {
                            while ($rowAll = $connecting->fetch_assoc()) {
                                $id_po = $rowAll['po_number'];
                                $entry_by = $rowAll['entry_by'];
                                $id_quotation = $rowAll['id_quotation'];
                                $nama_rel = $rowAll['nama_rel'];
                                $po_status = $rowAll['po_status'];
                                $po = $rowAll['po_date'];
                                $sending = $rowAll['sending_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a href="../screen/po_progress.php?id=' . $id_po . '">' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $entry_by . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_rel . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $sending . '</a>'; ?></td>
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
                                PO Number
                            </th>
                            <th class="text-center align-middle">
                                Entry by
                            </th>
                            <th class="text-center align-middle">
                                Principal/Vendor
                            </th>
                            <th class="text-center align-middle">
                                PO Date
                            </th>
                            <th class="text-center align-middle">
                                Sending at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_rel FROM `purchase_order` A
                                    INNER JOIN po_relation B
                                    USING (id_rel)
                            WHERE MONTH(po_date) = MONTH(CURRENT_DATE())
                            AND YEAR(po_date) = YEAR(CURRENT_DATE());";
                        $connectMonthly = mysqli_query($conn, $sql);
                        if ($connectMonthly) {
                            while ($rowDataMonthly = $connectMonthly->fetch_assoc()) {
                                $id_po = $rowDataMonthly['po_number'];
                                $entry_by = $rowDataMonthly['entry_by'];
                                $id_quotation = $rowDataMonthly['id_quotation'];
                                $nama_rel = $rowDataMonthly['nama_rel'];
                                $po_status = $rowDataMonthly['po_status'];
                                $po = $rowDataMonthly['po_date'];
                                $sending = $rowDataMonthly['sending_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a href="../screen/po_progress.php?id=' . $id_po . '">' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $entry_by . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_rel . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $sending . '</a>'; ?></td>
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
                                PO Number
                            </th>
                            <th class="text-center align-middle">
                                Entry by
                            </th>
                            <th class="text-center align-middle">
                                Principal/Vendor
                            </th>
                            <th class="text-center align-middle">
                                PO Date
                            </th>
                            <th class="text-center align-middle">
                                Sending at
                            </th>
                            <th class="text-center align-middle">
                                PO Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT A.*, B.nama_rel FROM `purchase_order` A
                                    INNER JOIN po_relation B
                                    USING (id_rel);";
                        $connecting = mysqli_query($conn, $sql);
                        if ($connecting) {
                            while ($rowAll = $connecting->fetch_assoc()) {
                                $id_po = $rowAll['po_number'];
                                $entry_by = $rowAll['entry_by'];
                                $id_quotation = $rowAll['id_quotation'];
                                $nama_rel = $rowAll['nama_rel'];
                                $po_status = $rowAll['po_status'];
                                $po = $rowAll['po_date'];
                                $sending = $rowAll['sending_date'];

                                $po_date = date("F d, Y", strtotime($po));
                        ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo '<a href="../screen/po_progress.php?id=' . $id_po . '">' . $id_po . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $entry_by . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $nama_rel . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $po_date . '</a>'; ?></td>
                                    <td class="text-center align-middle"><?php echo '<a>' . $sending . '</a>'; ?></td>
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