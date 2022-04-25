<div class="content-wrapper">
    <?php
    if ($row['level'] != 'Teknisi') {
    ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Upload Attachments</h1>
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
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="../../database/attachments/upload_attachments.php">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="submit" name="btnUploadAttach" class="btn btn-primary btn-block"><i class="fas fa-cloud-upload-alt"></i>&nbsp;Upload</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    <?php
    } else {
    ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Upload Attachments</h1>
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
                        <img src="../../dist/img/401.png" class="rounded mx-auto d-block" alt="401 Error" style="width: 50%;">
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    <?php
    }
    ?>
</div>