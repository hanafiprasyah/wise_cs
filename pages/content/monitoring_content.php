<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Monitoring</h1>
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
            <?php
            if ($row['level'] == 'Administrator') {
            ?>
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" onclick="removeLoginLogs()" class="btn btn-outline-danger btn-block"><i class="fas fa-trash"></i>&nbsp Delete All Logs</butt>
                    </div>
                </div><br>
            <?php
            }
            ?>
            <div class="row px-2 py-2">
                <div class="col-sm-12">
                    <div class="card shadow rounded">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Monitoring Table</h3>
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
                                        <th class="text-center">
                                            IP Address
                                        </th>
                                        <th class="text-center">
                                            Browser and Platform
                                        </th>
                                        <th class="text-center">
                                            Full Name
                                        </th>
                                        <th class="text-center">
                                            Level
                                        </th>
                                        <th class="text-center">
                                            Login
                                        </th>
                                        <th class="text-center">
                                            Logout
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT A.*, B.username, B.nama_lengkap, B.level FROM `login_session` A
                                    INNER JOIN user B
                                    USING (id_user) ORDER BY A.login_date DESC;";
                                    $connectDS = mysqli_query($conn, $sql);
                                    if ($connectDS) {
                                        while ($rowDS = $connectDS->fetch_assoc()) {
                                            $session_id     = $rowDS['id_session'];
                                            $browser        = $rowDS['browser'];
                                            $platform       = $rowDS['platform'];
                                            $ip_user        = $rowDS['ip_address'];
                                            $name_log       = $rowDS['nama_lengkap'];
                                            $username_log   = $rowDS['username'];
                                            $level          = $rowDS['level'];
                                            $loggedDate     = $rowDS['login_date'];
                                            $logoutDate     = $rowDS['logout'];

                                            $login_date     = date("F d, Y H:i", strtotime($loggedDate));
                                            $logout_date    = date("F d, Y H:i", strtotime($logoutDate));
                                    ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo '<a>' . $ip_user . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $browser . '/' . $platform . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $name_log . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $level . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo '<a>' . $login_date . '</a>'; ?></td>
                                                <td class="text-center align-middle"><?php echo $logout_date == 'January 01, 1970 01:00' ? 'Online until now' : '<a>' . $logout_date . '</a>'; ?></td>
                                            </tr>
                                    <?php
                                        }
                                        $connectDS->free();
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