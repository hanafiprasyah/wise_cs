<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Activity Tracker</h1>
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
        <!-- <div class="row">
            <div class="col-12 mt-2 text-center">
                <p class="lead" style="padding-left: 10%; padding-right: 10%;">
                    <b>Activity Tracker</b>
                    is one of the <i>WISE CS feature</i> that can be your assistant
                    to give you all of informations about your last sales activities.<br />
                </p><br>
            </div>
        </div> -->
        <div class="d-flex justify-content-center">
            <div class="form-group mx-sm-3 mb-4">
                <span class="badge badge-danger">New</span>&nbsp;<span class="badge badge-info">Choose your style</span>
                <select class="custom-select" id="myselection">
                    <option selected>Select UI</option>
                    <option value="Table">Table View</option>
                    <option value="Timeline">Timeline View</option>
                </select>
            </div>
        </div>
        <!-- Table UI -->
        <div id="showTable" class="myDiv">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow rounded mx-2 my-2">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Sales Activity Table</h3>
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
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                # ID
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Customer
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Proposal
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Presentation
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Survey
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Report
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                Quotation
                                            </th>
                                            <th class="text-center align-middle" style="width: 12.5%;">
                                                PO
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT A.*, B.* FROM `activity_tracker` A 
                                        INNER JOIN `client` B 
                                        USING (id_client);";
                                        $connecting = mysqli_query($conn, $sql);
                                        if ($connecting) {
                                            while ($rowAct = $connecting->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td class="text-center align-middle">WISE-<?php echo $rowAct['id_activity'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['nama_customer']; ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['proposal_submit'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['presentation_submit'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['survey_submit'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['report_submit'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['quotation_submit'] ?></td>
                                                    <td class="text-center align-middle"><?php echo $rowAct['po_submit'] ?></td>
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
        </div>
        <!-- Timeline UI -->
        <div id="showTimeline" class="myDiv">
            <div class="row mx-2">
                <div class="col-12" id="accordion">
                    <?php
                    $selectDataTracker = $conn->query("SELECT id_activity, status FROM activity_tracker;");
                    while ($rowDataTracker = mysqli_fetch_array($selectDataTracker)) {
                        $id_activity            = $rowDataTracker['id_activity'];
                        $status                 = $rowDataTracker['status'];

                        // Select Pre Customer Name
                        $selectPreCustomer = $conn->query("SELECT A.id_activity, B.nama_customer FROM `activity_tracker` A
                        INNER JOIN client B
                        USING (id_client)
                        WHERE id_activity = '" . $id_activity . "';");
                        $rowCustomerTarget = mysqli_fetch_array($selectPreCustomer);
                        $customer_target = $rowCustomerTarget['nama_customer'];
                    ?>
                        <!-- UI for showing list -->
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#row<?php echo $id_activity; ?>">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        Customer Target : <?php echo $customer_target; ?>
                                    </h4>
                                    <small><?php echo $status; ?></small>
                                </div>
                            </a>
                            <div id="row<?php echo $id_activity; ?>" class="collapse hide" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- Proposal -->
                                                <?php
                                                $selectProposalTimeline  = $conn->query("SELECT proposal_title, proposal_submit FROM `activity_tracker` WHERE id_activity = '" . $id_activity     . "';");
                                                while ($rowProposalTimeLine     = mysqli_fetch_array($selectProposalTimeline)) {
                                                    $proposal_title         = $rowProposalTimeLine['proposal_title'];
                                                    $proposal_submit        = $rowProposalTimeLine['proposal_submit'];

                                                    // $id_presentation        = $rowDataTracker['id_presentation'];
                                                    // $presentation_submit    = $rowDataTracker['presentation_submit'];
                                                    // $id_survey              = $rowDataTracker['id_survey'];
                                                    // $survey_submit          = $rowDataTracker['survey_submit'];
                                                    // $id_report              = $rowDataTracker['id_report'];
                                                    // $report_submit          = $rowDataTracker['report_submit'];
                                                    // $id_quotation           = $rowDataTracker['id_quotation'];
                                                    // $quotation_submit       = $rowDataTracker['quotation_submit'];
                                                    // $id_po                  = $rowDataTracker['id_po'];
                                                    // $po_submit              = $rowDataTracker['po_submit'];

                                                    // Format the date
                                                    $prosub_format          = date("F d, Y", strtotime($proposal_submit));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $prosub_format; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $proposal_date          = strtotime($proposal_submit);
                                                            $remaining1             = $proposal_date - time();
                                                            $proposal_remaining     = floor($remaining1 / -86400);

                                                            // $po_date                = strtotime($po_submit);
                                                            // $remaining6             = $po_date - time();
                                                            // $po_remaining           = floor($remaining6 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $proposal_remaining == '0' ? 'Today' : $proposal_remaining . ' days ago'; ?></span>
                                                            <h3 class="timeline-header">Proposal : <?php echo $proposal_title; ?></h3>
                                                            <!-- <div class="timeline-body">
                                                        <div class="tab-content">
                                                            <div class="active tab-pane" id="settings">
                                                                <form class="form-horizontal" action="" method="POST">
                                                                    <div class="form-group row">
                                                                        <label for="price" class="col-sm-4 col-form-label">Customer Requested Price</label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" id="price" name="price" placeholder="How much is it?" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="offset-sm-4 col-sm-8">
                                                                            <button type="submit" name="btnAddQuotation" class="btn btn-success">Add Quotation</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <!-- Presentation -->
                                                <?php
                                                $selectPresentationTimeline  = $conn->query("SELECT A.presentation_submit, A.id_presentation, B.presentation_name, B.presentation_status FROM `activity_tracker` A 
                                            INNER JOIN presentation B
                                            USING (id_presentation)
                                            WHERE id_activity = '" . $id_activity . "';");
                                                while ($rowPresentationTimeline     = mysqli_fetch_array($selectPresentationTimeline)) {
                                                    $id_presentation         = $rowPresentationTimeline['id_presentation'];
                                                    $presentation_submit        = $rowPresentationTimeline['presentation_submit'];
                                                    $presentation_name         = $rowPresentationTimeline['presentation_name'];
                                                    $presentation_status        = $rowPresentationTimeline['presentation_status'];

                                                    // Format the date
                                                    $presub_format          = date("F d, Y", strtotime($presentation_submit));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $presub_format; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $presentation_date      = strtotime($presentation_submit);
                                                            $remaining2             = $presentation_date - time();
                                                            $presentation_remaining = floor($remaining2 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $presentation_remaining == '0' ? 'Today' : $presentation_remaining . ' days ago'; ?></span>
                                                            <!-- <h3 class="timeline-header"><a href="">Customer</a> asks to renegotiate</h3> -->
                                                            <h3 class="timeline-header">Presentation : <?php echo $presentation_name; ?></h3>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <!-- Survey -->
                                                <?php
                                                $selectSurveyTimeline  = $conn->query("SELECT A.id_survey, A.survey_submit, B.survey_pic, B.notel_survey, B.tech_team, B.survey_location FROM activity_tracker A
                                            INNER JOIN survey B
                                            USING (id_survey)
                                            WHERE id_activity = '" . $id_activity . "';");
                                                while ($rowSurveyTimeline     = mysqli_fetch_array($selectSurveyTimeline)) {
                                                    $id_survey         = $rowSurveyTimeline['id_survey'];
                                                    $survey_submit         = $rowSurveyTimeline['survey_submit'];
                                                    $survey_pic         = $rowSurveyTimeline['survey_pic'];
                                                    $notel_survey         = $rowSurveyTimeline['notel_survey'];
                                                    $tech_team         = $rowSurveyTimeline['tech_team'];
                                                    $survey_location         = $rowSurveyTimeline['survey_location'];

                                                    // Format the date
                                                    $surveysub_format          = date("F d, Y", strtotime($survey_submit));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $surveysub_format; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $survey_date            = strtotime($survey_submit);
                                                            $remaining3             = $survey_date - time();
                                                            $survey_remaining       = floor($remaining3 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $survey_remaining == '0' ? 'Today' : $survey_remaining . ' days ago'; ?></span>
                                                            <!-- <h3 class="timeline-header"><a href="">Customer</a> asks to renegotiate</h3> -->
                                                            <h3 class="timeline-header">Survey : <?php echo $survey_location; ?></h3>
                                                            <h3 class="timeline-header">Engineer : <b><?php echo $tech_team; ?></b></h3>
                                                            <h3 class="timeline-header">Customer P.I.C. : <?php echo $survey_pic; ?></h3>
                                                            <h3 class="timeline-header">Phone Number : <?php echo $notel_survey; ?></h3>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <!-- Report -->
                                                <?php
                                                $selectReportTimeline  = $conn->query("SELECT A.id_report, A.report_submit, B.report_title, B.id_user, B.report_status, C.nama_lengkap FROM report B
                                            INNER JOIN activity_tracker A
                                            USING (id_report)
                                            INNER JOIN user C
                                            USING (id_user)
                                            WHERE id_activity = '" . $id_activity . "';");
                                                while ($rowReportTimeline     = mysqli_fetch_array($selectReportTimeline)) {
                                                    $id_report         = $rowReportTimeline['id_report'];
                                                    $nama_lengkap       = $rowReportTimeline['nama_lengkap'];
                                                    $report_submit         = $rowReportTimeline['report_submit'];
                                                    $report_title         = $rowReportTimeline['report_title'];
                                                    $id_user         = $rowReportTimeline['id_user'];
                                                    $report_status         = $rowReportTimeline['report_status'];

                                                    // Format the date
                                                    $reportsub_format          = date("F d, Y", strtotime($report_submit));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $reportsub_format; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $report_date            = strtotime($report_submit);
                                                            $remaining4             = $report_date - time();
                                                            $report_remaining       = floor($remaining4 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $report_remaining == '0' ? 'Today' : $report_remaining . ' days ago'; ?></span>
                                                            <!-- <h3 class="timeline-header"><a href="">Customer</a> asks to renegotiate</h3> -->
                                                            <h3 class="timeline-header">Report : <?php echo $report_title; ?></h3>
                                                            <h3 class="timeline-header">Created by : <b><?php echo $nama_lengkap; ?></b></h3>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <!-- Quotation -->
                                                <?php
                                                $selectQuotationTimeline  = $conn->query("SELECT B.id_quotation, B.nama_lengkap, B.price, B.quotation_status, A.id_activity, A.quotation_submit FROM activity_tracker A
                                            INNER JOIN quotation B
                                            USING (id_quotation)
                                            WHERE id_activity = '" . $id_activity . "';");
                                                while ($quoTimeline     = mysqli_fetch_array($selectQuotationTimeline)) {
                                                    $id_quotation             = $quoTimeline['id_quotation'];
                                                    $nama_lengkap             = $quoTimeline['nama_lengkap'];
                                                    $price                    = $quoTimeline['price'];
                                                    $quotation_status         = $quoTimeline['quotation_status'];
                                                    $quotation_submit         = $quoTimeline['quotation_submit'];

                                                    // Format the date
                                                    $quotformat          = date("F d, Y", strtotime($quotation_submit));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $quotformat; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $quotation_date         = strtotime($quotation_submit);
                                                            $remaining5             = $quotation_date - time();
                                                            $quotation_remaining    = floor($remaining5 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $quotation_remaining == '0' ? 'Today' : $quotation_remaining . ' days ago'; ?></span>
                                                            <!-- <h3 class="timeline-header"><a href="">Customer</a> asks to renegotiate</h3> -->
                                                            <h3 class="timeline-header">Quotation ID : <i>"<?php echo $id_quotation; ?>"</i></h3>
                                                            <h3 class="timeline-header">Chairman : <b><?php echo $nama_lengkap; ?></b></h3>
                                                            <h3 class="timeline-header">Value : <?php echo $row['level'] == 'Direksi' || $row['level'] == 'Administrator' ? $price : '*********'; ?></h3>
                                                            <h3 class="timeline-header">Status : <?php echo $quotation_status; ?></h3>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <!-- Purchase Order -->
                                                <?php
                                                $selectPOtimeline  = $conn->query("SELECT A.*, B.* FROM `activity_tracker` A
                                            INNER JOIN purchase_order B
                                            USING (po_number)
                                            WHERE id_activity = '" . $id_activity . "';");
                                                while ($poTimeline     = mysqli_fetch_array($selectPOtimeline)) {
                                                    $id_po                    = $poTimeline['po_number'];
                                                    $id_quotation             = $poTimeline['id_quotation'];
                                                    $po_status                = $poTimeline['po_status'];
                                                    $po_date                  = $poTimeline['po_date'];

                                                    // Format the date
                                                    $poFormat          = date("F d, Y", strtotime($po_date));
                                                ?>
                                                    <div class="time-label">
                                                        <span class="bg-red"><?php echo $poFormat; ?></span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-handshake bg-blue"></i>
                                                        <i class="fas fa-angle-double-right bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <?php
                                                            $po                     = strtotime($po_date);
                                                            $remaining6             = $po - time();
                                                            $po_remaining           = floor($remaining6 / -86400);
                                                            ?>
                                                            <span class="time"><i class="fas fa-clock"></i> &nbsp <?php echo $po_remaining == '0' ? 'Today' : $po_remaining . ' days ago'; ?></span>
                                                            <h3 class="timeline-header">PO Number : <i>"<?php echo $id_po; ?>"</i></h3>
                                                            <h3 class="timeline-header">PO Status : <?php echo $po_status; ?></h3>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->