<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Installation Detail</h1>
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
        <div class="row px-3">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card shadow rounded" id="printableArea">
                    <!-- <div class="card-header">
                <h3 class="card-title">Projects Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div> -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light shadow rounded">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-info">Installation Date</span>
                                                <?php
                                                $curDate1 = $rowDatas['tgl_pemasangan'];
                                                $curDate2 = $rowDatas['visit_schedule'];
                                                $curDate3 = $rowDatas['exp_guarantee'];
                                                $installDate = date("F d, Y", strtotime($curDate1));
                                                $visitDate = date("F d, Y", strtotime($curDate2));
                                                $expDate = date("F d, Y", strtotime($curDate3));
                                                ?>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $installDate; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light shadow rounded">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-success">Scheduled Visit</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo date("F d, Y") == $visitDate ? '<a style="color:black;">Today</a>' : '<a>' . $visitDate . '</a>'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light shadow rounded">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-danger">Expired Guarantee</span>
                                                <span class="info-box-number text-center text-muted mb-0"><?php echo $expDate; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4" style="display: flex;">
                                    <div class="col-12">
                                        <h4>About this installation :</h4>
                                        <br />
                                    </div>
                                    <div class="column" style="flex: 50%;">
                                        <div class="text-muted" style="text-align: center;">
                                            <p class="text-sm">Product Type
                                                <b class="d-block"><?php echo $rowDatas['tipe_produk'] == NULL ? '-' : $rowDatas['tipe_produk']; ?></b>
                                            </p>
                                            <p class="text-sm">Quantity
                                                <b class="d-block"><?php echo $rowDatas['jumlah_pesanan'] == NULL ? '-' : $rowDatas['jumlah_pesanan'];
                                                                    echo '&nbsp';
                                                                    echo $rowDatas['satuan'] == NULL ? '' : $rowDatas['satuan']; ?></b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="column" style="flex: 50%;">
                                        <div class="text-muted" style="text-align: center;">
                                            <p class="text-sm">Visit Frequency
                                                <b class="d-block"><?php echo $rowDatas['frekuensi'] == NULL ? '-' : $rowDatas['frekuensi']; ?></b>
                                            </p>
                                            <p class="text-sm">Visit Status
                                                <b class="d-block"><?php echo $rowDatas['visiting_status'] == NULL ? '-' : $rowDatas['visiting_status']; ?></b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-4 mt-4" style="display: flex;">
                                    <div class="text-muted" style="text-align: center;">
                                        <p class="text-sm">Install Location
                                            <b class="d-block"><?php echo $rowDatas['lokasi_pemasangan'] == NULL ? '-' : $rowDatas['lokasi_pemasangan']; ?></b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <h5>Serial Number : </h5>
                                <h3 class="text-primary"><i class="fa fa-archive"><br /></i> <?php echo $rowDatas['sn'] == NULL ? '-' : $rowDatas['sn']; ?></h3>
                                <h5>Description : </h5>
                                <p class="text-muted"><?php echo $rowDatas['deskripsi'] == NULL ? '-' : $rowDatas['deskripsi']; ?></p>
                                <br>
                                <div class="text-muted">
                                    <p class="text-sm">Company
                                        <b class="d-block"><?php echo $rowDatas['nama_customer'] == NULL ? '-' : $rowDatas['nama_customer']; ?></b>
                                    </p>
                                    <p class="text-sm">Person In Charge
                                        <b class="d-block"><?php echo $rowDatas['pic'] == NULL ? '-' : $rowDatas['pic']; ?></b>
                                    </p>
                                    <p class="text-sm">Phone Number
                                        <b class="d-block"><?php echo $rowDatas['notel'] == NULL ? '-' : $rowDatas['notel']; ?></b><br>
                                    </p>
                                </div>

                                <!-- <h5 class="mt-5 text-muted">Project files</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                            </li>
                        </ul> -->
                                <div class="text-center mt-5 mb-3">
                                    <!-- <a href="#" class="btn btn-sm btn-warning">Edit This Project</a>
                            <a href="#" class="btn btn-sm btn-danger">Remove</a> -->
                                    <button class="btn btn-info" onclick="printProject()" type="submit"> <i class="fa fa-print"></i> Print</button>
                                    <?php
                                    if ($row['level'] != 'Teknisi') {
                                    ?>
                                        <button class="btn btn-warning" onclick="editProject()" type="submit"> <i class="fas fa-edit" aria-hidden="true"></i> Edit</button>
                                        <button class="btn btn-danger" onclick="removeProject()" type="submit"> <i class="fas fa-trash"></i> Remove</button>
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