<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Welcome, <b><?php echo $row['nama_lengkap']; ?>!</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><?php echo $row['level']; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col-md-12">
        <?php
        if ($row['email'] == null || $row['alamat'] == null || $row['moto_hidup'] == null) {
          include("../content/completing_content.php");
        } else {
        }
        ?>
      </div>
      <div class="col-md-12">
        <div class="row">
          <!-- TRACKER -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $sql_count = "SELECT * FROM activity_tracker WHERE status='On Progress';";
                $connectdata = mysqli_query($conn, $sql_count);
                $rowdata = mysqli_num_rows($connectdata);
                echo "<h3>" . $rowdata . "</h3>";
                ?>
                <small>New Data</small>
                <p>Activity Tracked</p>
              </div>
              <div class="icon">
                <i class="fas fa-thumbtack"></i>
                <!-- <i class="fas fa-envelope"></i> -->
              </div>
              <a href="../screen/tracker.php?id=405001" class="small-box-footer">See what happens <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- MAINTENANCE REQUEST -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                <?php
                $sql_count = "SELECT * FROM maintenance_req;";
                $connectdata = mysqli_query($conn, $sql_count);
                $rowMainReq = mysqli_num_rows($connectdata);
                echo "<h3>" . $rowMainReq . "</h3>";
                ?>
                <small>Current</small>
                <p>Maintenance Request</p>
              </div>
              <div class="icon">
                <i class="fa fa-wrench"></i>
              </div>
              <a href="../screen/main_req.php?id=105001" class="small-box-footer">Let's check it out <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- SCHEDULED VISIT -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                //getDefaultDate(ASIA/BANGKOK)
                date_default_timezone_set("Asia/Bangkok");
                $currentDate = date("Y/m/d");
                $visitsched = date("Y/m/d", strtotime("1 months"));

                // $allData = "SELECT * FROM project";
                // $connecting = mysqli_query($conn,$allData);
                // $rowDataTRIM = mysqli_fetch_array($connecting);
                // $ourDate = $rowDataTRIM['tgl_pemasangan'];
                // $trimDate = date("Y/m/d", strtotime($ourDate."+6 months"));
                $searchData = "SELECT * FROM project WHERE visit_schedule BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH);";
                $connecting = mysqli_query($conn, $searchData);
                $rowScheduled = mysqli_num_rows($connecting);
                echo "<h3>" . $rowScheduled . "</h3>";
                ?>
                <small>Less than 1 Month</small>
                <p>Scheduled Visit</p>
              </div>
              <div class="icon">
                <i class="fa fa-clock"></i>
              </div>
              <a href="../screen/scheduled_detail.php?id=105003" class="small-box-footer">Where is it? <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- EXPIRED GUARANTEE -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                //getDefaultDate(ASIA/BANGKOK)
                date_default_timezone_set("Asia/Bangkok");
                $notifDate = date("Y/m/d", strtotime("-1 months"));
                $expiredDate = date("Y/m/d", strtotime("+1 months"));
                $currentDate = date("Y/m/d");
                // echo "1 month after today is " . $expiredDate;

                $sql = "SELECT * FROM project WHERE exp_guarantee BETWEEN (CURRENT_DATE+1) AND (CURRENT_DATE + INTERVAL 1 MONTH) AND exp_status = 'Continues';";
                $connecting = mysqli_query($conn, $sql);
                $rowExpired = mysqli_num_rows($connecting);
                echo "<h3>" . $rowExpired . "</h3>";
                ?>
                <small>Data of</small>
                <p>Running Out Warranty</p>
              </div>
              <div class="icon">
                <i class="fa fa-exclamation"></i>
              </div>
              <a href="../screen/warranty_detail.php?id=105004" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      <?php
      $monthName = date("F");
      $year  = date("Y");
      ?>
      <div class="row">
        <!-- QUOTES -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-quote-right"></i>
                &nbsp Quotes
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
              $sqlQ = mysqli_query($conn, "SELECT U.nama_lengkap, Q.*
            FROM `quotes` Q
            INNER JOIN user U
            USING (id_user) WHERE quotes_status='Show' LIMIT 1;");
              while ($rowQ = mysqli_fetch_array($sqlQ)) {
                $nama_penulis = $rowQ['nama_lengkap'];
                $quote        = $rowQ['quotes'];
                $created      = $rowQ['quote_created'];
                $status       = $rowQ['quotes_status'];
              }
              $data_counting = mysqli_num_rows($sqlQ);
              if ($data_counting == 0) {
              ?>
                <blockquote>
                  <h2>Quotes not found!</h2>
                  <!-- <small>Director of Operational<cite title="Source Title">Source Title</cite></small> -->
                  <small>Writter not found!</small>
                </blockquote>
              <?php
              } else {
              ?>
                <blockquote>
                  <h2><?php echo $quote; ?></h2>
                  <!-- <small>Director of Operational<cite title="Source Title">Source Title</cite></small> -->
                  <small><?php echo $nama_penulis; ?></small>
                </blockquote>
              <?php
              }
              ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- ACTIVITY -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tasks"></i>
                &nbsp Activity on <b><?php echo $monthName; ?>, &nbsp<?php echo $year; ?></b>
              </h3>
            </div>
            <div class="card-body">
              <?php
              // SQL
              $month = date("m");
              $sql_countProp = "SELECT * FROM proposal WHERE MONTH(submit_date) = MONTH(CURRENT_DATE()) AND YEAR(submit_date) = YEAR(CURRENT_DATE());";
              $sql_countPres = "SELECT * FROM presentation WHERE MONTH(presentation_date) = MONTH(CURRENT_DATE()) AND YEAR(presentation_date) = YEAR(CURRENT_DATE());";
              $sql_countSurv = "SELECT * FROM survey WHERE MONTH(survey_date) = MONTH(CURRENT_DATE()) AND YEAR(survey_date) = YEAR(CURRENT_DATE());";
              $sql_countRepo = "SELECT * FROM report WHERE MONTH(report_created) = MONTH(CURRENT_DATE()) AND YEAR(report_created) = YEAR(CURRENT_DATE());";
              $sql_countQuo  = "SELECT * FROM quotation WHERE MONTH(quotation_date) = MONTH(CURRENT_DATE()) AND YEAR(quotation_date) = YEAR(CURRENT_DATE());";
              $sql_countPO   = "SELECT * FROM purchase_order WHERE MONTH(po_date) = MONTH(CURRENT_DATE()) AND YEAR(po_date) = YEAR(CURRENT_DATE());";
              $sql_countPro  = "SELECT * FROM project WHERE MONTH(tgl_pemasangan) = MONTH(CURRENT_DATE()) AND YEAR(tgl_pemasangan) = YEAR(CURRENT_DATE());";
              // Connect
              $connectProp = mysqli_query($conn, $sql_countProp);
              $connectPres = mysqli_query($conn, $sql_countPres);
              $connectSurv = mysqli_query($conn, $sql_countSurv);
              $connectRepo = mysqli_query($conn, $sql_countRepo);
              $connectQuo  = mysqli_query($conn, $sql_countQuo);
              $connectPO   = mysqli_query($conn, $sql_countPO);
              $connectPro  = mysqli_query($conn, $sql_countPro);
              // Count Datas
              $rowdataProp = mysqli_num_rows($connectProp);
              $rowdataPres = mysqli_num_rows($connectPres);
              $rowdataSurv = mysqli_num_rows($connectSurv);
              $rowdataRepo = mysqli_num_rows($connectRepo);
              $rowdataQuo  = mysqli_num_rows($connectQuo);
              $rowdataPO   = mysqli_num_rows($connectPO);
              $rowdataPro  = mysqli_num_rows($connectPro);
              ?>
              <a class="btn btn-app" href="../screen/proposal.php?id=405002">
                <span class="badge bg-success"><?php echo $rowdataProp == 0 ? '' : $rowdataProp; ?></span>
                <i class="fas fa-file-word"></i> Proposal
              </a>
              <a class="btn btn-app" href="../screen/presentation.php?id=405003">
                <span class="badge bg-success"><?php echo $rowdataPres == 0 ? '' : $rowdataPres; ?></span>
                <i class="fas fa-file-powerpoint"></i> Presentation
              </a>
              <a class="btn btn-app" href="../screen/survey.php?id=405004">
                <span class="badge bg-success"><?php echo $rowdataSurv == 0 ? '' : $rowdataSurv; ?></span>
                <i class="fab fa-searchengin"></i></i> Survey Activity
              </a>
              <a class="btn btn-app" href="../screen/report.php?id=405005">
                <span class="badge bg-success"><?php echo $rowdataRepo == 0 ? '' : $rowdataRepo; ?></span>
                <i class="fas fa-file-powerpoint"></i></i> Survey Report
              </a>
              <a class="btn btn-app" href="../screen/quotation.php?id=405006">
                <span class="badge bg-success"><?php echo $rowdataQuo == 0 ? '' : $rowdataQuo; ?></span>
                <i class="fas fa-comments"></i> Quotation
              </a>
              <a class="btn btn-app" href="../screen/purchase_order.php?id=405007">
                <span class="badge bg-success"><?php echo $rowdataPO == 0 ? '' : $rowdataPO; ?></span>
                <i class="fas fa-file-invoice-dollar"></i> Purchase Order
              </a>
              <!-- <a class="btn btn-app">
                <span class="badge bg-success"><?php echo $rowdataPro == 0 ? '' : $rowdataPro; ?></span>
                <i class="fas fa-tools"></i> Installation
              </a> -->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>