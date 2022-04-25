<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Quotes</h1>
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
                <div class="col-md-12">
                    <div class="card shadow rounded mx-2 my-2">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Quotes Table</h3>
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
                                            ID
                                        </th>
                                        <th class="text-center align-middle">
                                            Quotes
                                        </th>
                                        <th class="text-center align-middle">
                                            Created by
                                        </th>
                                        <th class="text-center align-middle">
                                            Created at
                                        </th>
                                        <th class="text-center align-middle">
                                            Quotes Status
                                        </th>
                                        <th class="text-center align-middle">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT A.*, B.nama_lengkap FROM quotes A
                            INNER JOIN user B
                            USING (id_user);";
                                    $connecting = mysqli_query($conn, $sql);
                                    if ($connecting) {
                                        while ($rowQuo = $connecting->fetch_assoc()) {
                                            $id_user = $rowQuo['id_user'];
                                            $id_quotes = $rowQuo['id_quotes'];
                                            $quotes = $rowQuo['quotes'];
                                            $nama_lengkap = $rowQuo['nama_lengkap'];
                                            $created = $rowQuo['quote_created'];
                                            $status = $rowQuo['quotes_status'];
                                            $suitDate = date("F d, Y", strtotime($created));
                                    ?>
                                            <tr>
                                                <td><?php echo '<a>' . $id_quotes . '</a>'; ?></td>
                                                <td><?php echo '<a>' . $quotes . '</a>'; ?></td>
                                                <td><?php echo '<a href="../screen/user_detail.php?id=' . $id_user . '">' . $nama_lengkap . '</a>'; ?></td>
                                                <td><?php echo '<a>' . $suitDate . '</a>'; ?></td>
                                                <td><?php echo '<a>' . $status . '</a>'; ?></td>
                                                <td>
                                                    <?php
                                                    if ($status == 'Show') {
                                                    ?>
                                                        <form action="../../database/quotes/hide.php?id=<?php echo $id_quotes; ?>" method="POST">
                                                            <button type="submit" id="btnHideQuotes" name="btnHideQuotes" class="btn btn-app bg-warning">
                                                                <i class="fas fa-eye-slash"></i> Hide
                                                            </button>
                                                        </form>
                                                        <form action="../../database/quotes/delete.php?id=<?php echo $id_quotes; ?>" method="POST">
                                                            <button type="submit" id="btnDeleteQuotes" name="btnDeleteQuotes" class="btn btn-app bg-danger">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <form action="../../database/quotes/show.php?id=<?php echo $id_quotes; ?>" method="POST">
                                                            <button type="submit" id="btnShowQuotes" name="btnShowQuotes" class="btn btn-app bg-info">
                                                                <i class="fas fa-eye"></i> Show
                                                            </button>
                                                        </form>
                                                        <form action="../../database/quotes/delete.php?id=<?php echo $id_quotes; ?>" method="POST">
                                                            <button type="submit" id="btnDeleteQuotes" name="btnDeleteQuotes" class="btn btn-app bg-danger">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    <?php
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>