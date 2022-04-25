<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Attachments</h1>
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
            <div class="row px-2">
                <div class="col-md-12 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Files Table</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="withoutButton" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            File Name
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $files = scandir("../../uploads");
                                    for ($a = 2; $a < count($files); $a++) {
                                    ?>
                                        <tr>
                                            <td class="text-center align-middle"><a href="../../uploads/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a></td>
                                        </tr>
                                        <p>

                                        </p>
                                    <?php
                                    }
                                    ?>
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