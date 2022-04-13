<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?php echo $row['level']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    // get total project
    $countProject = "SELECT COUNT(*) total_project FROM project WHERE id_client='" . $id_url . "';";
    $totalProject = mysqli_query($conn, $countProject);
    $rowTotPro = mysqli_fetch_array($totalProject);
    // General
    $id_client = $_GET['id'];
    $id_url = mysqli_real_escape_string($conn, $id_client);
    $sql = "SELECT * FROM `client` WHERE id_client='" . $id_url . "';";
    $resultID = mysqli_query($conn, $sql);
    $rowDataClient = mysqli_fetch_array($resultID);

    $register_date  = $rowDataClient['customer_registered'];
    $register_time  = $rowDataClient['customer_registered'];
    $format_regisDate   = date("F d, Y", strtotime($register_date));
    $format_regisTime   = date("H.i", strtotime($register_time));
    ?>
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
                                                <span class="info-box-text text-center text-muted">Customer ID</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $rowDataClient['id_client']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-success">Project(s)</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $rowTotPro['total_project']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-info">Customer Registered</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $format_regisDate . ' / ' . $format_regisTime . ' WIB'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <h4>Relation Project(s) :</h4>
                                        <br />
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Type</th>
                                                            <th>Install Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT 
                                                A.tgl_pemasangan, B.tipe_produk
                                                FROM project A
                                                INNER JOIN product B
                                                USING (id_product)
                                                WHERE id_client = '" . $id_url . "';";
                                                        $connectRelProject = mysqli_query($conn, $sql);
                                                        if ($connectRelProject) {
                                                            while ($rowRelPro = $connectRelProject->fetch_assoc()) {
                                                                $product_type = $rowRelPro['tipe_produk'];
                                                                $install_date = $rowRelPro['tgl_pemasangan'];
                                                                $formatInstallDate = date("F d, Y", strtotime($install_date));
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo '<a>' . $product_type . '</a>'; ?></td>
                                                                    <td><?php echo '<a>' . $formatInstallDate . '</a>'; ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                            $connectRelProject->free();
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <br />
                                <h4 class="text-primary">
                                    <!--<i class="fa fa-id-badge"></i>--> <?php echo $rowDataClient['nama_customer']; ?>
                                </h4>
                                <br>
                                <h5>Address : </h5>
                                <p class="text-muted"><?php echo $rowDataClient['alamat_customer']; ?></p>
                                <br>
                                <div class="text-center mt-5 mb-3">
                                    <button class="btn btn-info" onclick="printClient()" type="submit"> <i class="fa fa-print"></i> Print</button>
                                    <?php
                                    if ($row['level'] != 'Teknisi') {
                                    ?>
                                        <button class="btn btn-warning" onclick="editClient()" type="submit"> <i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger" onclick="removeClient()" type="submit"> <i class="fas fa-trash"></i> Remove</button>
                                    <?php
                                    }
                                    ?>
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