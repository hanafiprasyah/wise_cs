<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New quotes</h1>
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
        <div class="container-fluid">
            <div class="row px-2">
                <div class="col-md-12 mb-5">
                    <div class="card shadow rounded">
                        <div class="card-body">
                            <?php if (isset($_GET['error'])) { ?>
                                <p><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="../../database/quotes/add_quotes.php?id=<?php echo $row['id_user']; ?>" method="POST">
                                        <div class="form-group row">
                                            <label for="quotes_text" class="col-sm-4 col-form-label text-right">Quotes</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="quotes_text" name="quotes_text" placeholder="What is in your mind?" required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="offset-sm-4 col-sm-4">
                                                <button type="submit" name="btnAddQuotes" class="btn btn-block btn-success"><i class="fas fa-save"></i> &nbsp Deploy Quotes</button>
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
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->