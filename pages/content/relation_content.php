<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Our Relations</h1>
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
                <div class="col-md-12 mb-4">
                    <div class="card shadow rounded mx-2 my-2">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Relations Table</h3>
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
                                            # ID
                                        </th>
                                        <th class="text-center align-middle">
                                            Company Name
                                        </th>
                                        <th class="text-center align-middle">
                                            Relation Type
                                        </th>
                                        <th class="text-center align-middle">
                                            Address
                                        </th>
                                        <th class="text-center align-middle">
                                            Relation Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `po_relation`;";
                                    $connecting = mysqli_query($conn, $sql);
                                    if ($connecting) {
                                        while ($rowRelData = $connecting->fetch_assoc()) {
                                            $id_rel = $rowRelData['id_rel'];
                                            $nama_rel = $rowRelData['nama_rel'];
                                            $jenis_rel = $rowRelData['jenis_rel'];
                                            $alamat_rel = $rowRelData['alamat_rel'];
                                            $status_rel = $rowRelData['status_rel'];
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $id_rel . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $nama_rel . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $jenis_rel . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $alamat_rel . '</a>'; ?></td>
                                                <td class="text-center align-middle">
                                                    <?php echo '<a>' . $status_rel . '</a>'; ?></td>
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