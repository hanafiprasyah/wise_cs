<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Installation</h1>
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
            <div class="row px-2 py-2">
                <div class="col-md-12 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Installation Table</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="projectTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            Customer
                                        </th>
                                        <th class="text-center align-middle">
                                            Product Type
                                        </th>
                                        <th class="text-center align-middle">
                                            S.N.
                                        </th>
                                        <th class="text-center align-middle">
                                            Location
                                        </th>
                                        <th class="text-center align-middle">
                                            Ins. Date
                                        </th>
                                        <th class="text-center align-middle">
                                            Visit Sched.
                                        </th>
                                        <!-- <th class="hidden-print">
                                            <center>Actions</center>
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT 
                                    A.id_project,
                                    A.tgl_pemasangan, 
                                    A.jumlah_pesanan, 
                                    A.lokasi_pemasangan, 
                                    A.visit_schedule, 
                                    A.sn, 
                                    B.tipe_produk,
                                    C.nama_customer
                                    FROM project A 
                                    INNER JOIN product B 
                                    USING (id_product) 
                                    INNER JOIN client C 
                                    USING (id_client) ORDER BY A.tgl_pemasangan ASC;";
                                    $connecting = mysqli_query($conn, $sql);
                                    if ($connecting) {
                                        while ($rowProject = $connecting->fetch_assoc()) {
                                            $id_project = $rowProject['id_project'];
                                            $cust = $rowProject['nama_customer'];
                                            $productType = $rowProject['tipe_produk'];
                                            $sn = $rowProject['sn'];
                                            $qty = $rowProject['jumlah_pesanan'];
                                            $insLoc = $rowProject['lokasi_pemasangan'];
                                            $dateInstall = $rowProject['tgl_pemasangan'];
                                            $dateVisit = $rowProject['visit_schedule'];
                                            $suitDate = date("Y/m/d", strtotime($dateInstall));
                                            $suitVisit = date("Y/m/d", strtotime($dateVisit));
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a href="../screen/project_detail.php?id=' . $id_project . '">' . $cust . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $productType . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $sn . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $insLoc . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $suitDate . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo date("F d, Y") == $suitVisit ? '<a style="color:red;">Today</a>' : '<a>' . $suitVisit . '</a>'; ?></td>
                                                <!-- <td class="hidden-print">
                                                    <a class="btn btn-app" href="../screen/project_detail.php?id=<?php echo $id_project; ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a class="btn btn-app" href="../../database/project/delete_project.php?id=<?php echo $id_project; ?>">
                                                        <i class="fas fa-trash"></i> Remove
                                                    </a>
                                                </td> -->
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