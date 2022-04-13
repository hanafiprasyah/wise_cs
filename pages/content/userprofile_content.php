<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Profile</h1>
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
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php echo
                '<img class="profile-user-img img-fluid img-circle"
                          src="data:image/jpeg/;base64,' . base64_encode($_SESSION['foto']) . '"
                          alt="User profile picture">';
                ?>
              </div>
              <br>
              <!-- src="../../dist/img/user4-128x128.jpg" -->

              <h3 class="profile-username text-center"><?php echo $row['nama_lengkap']; ?></h3>

              <p class="text-muted text-center"><?php echo $row['level']; ?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted"><?php echo $row['alamat']; ?></p>

              <hr>

              <strong><i class="far fa-file-alt mr-1"></i> Motto</strong>

              <p class="text-muted"><?php echo $row['moto_hidup']; ?></p>

              <hr>

              <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

              <p class="text-muted"><?php echo $row['email']; ?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab">Update Profile</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <?php if (isset($_GET['error'])) { ?>
                <p><?php echo $_GET['error']; ?></p>
              <?php } ?>
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" action="../../database/configures/update_config.php?id_user=<?php echo $_SESSION['id_user']; ?>" method="POST">
                    <div class="form-group row">
                      <?php if ($row['level'] == 'Administrator') { ?>
                        <label for="id_user" class="col-sm-2 col-form-label">User ID</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                          <h7 style="color:red">Warning!</h7>
                        </div>
                      <?php } else { ?>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        </div>
                      <?php } ?>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_lengkap" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Full Name" value="<?php echo $row['nama_lengkap']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Address"></textarea>
                      </div>
                      <script>
                        document.getElementById('alamat').value = "<?php echo $row['alamat']; ?>";
                      </script>
                    </div>
                    <div class="form-group row">
                      <label for="moto_hidup" class="col-sm-2 col-form-label">Motto</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="moto_hidup" name="moto_hidup" placeholder="Motto" value="<?php echo $row['moto_hidup']; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <?php
                      // Decrypt
                      $pass           = $row['password'];
                      $chiper         = "AES-128-CTR";
                      $iv_length      = openssl_cipher_iv_length($chiper);
                      $opt            = 0;
                      $dec_iv         = '1234567891011121';
                      $dec_key        = "wisecs";
                      $dec_pass       = openssl_decrypt($pass, $chiper, $dec_key, $opt, $dec_iv);
                      ?>
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dec_pass; ?>"><br>
                      </div>
                      <div class="col-sm-2">
                        <a class="btn btn-dark btn-block" onclick="showHideFunc()">
                          <i class="fas fa-eye"></i>
                        </a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <?php if ($row['level'] == 'Administrator') { ?>
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                          <select name="level" id="level" class="form-control select2bs4" style="width: 50%;">
                            <option value="Administrator" <?php if ($row['level'] == "Administrator") echo 'selected="selected"'; ?>>Administrator</option>
                            <option value="Admin Staff" <?php if ($row['level'] == "Admin Staff") echo 'selected="selected"'; ?>>Admin Staff</option>
                            <option value="Direksi" <?php if ($row['level'] == "Direksi") echo 'selected="selected"'; ?>>Direksi</option>
                            <option value="Teknisi" <?php if ($row['level'] == "Teknisi") echo 'selected="selected"'; ?>>Teknisi</option>
                          </select>
                        </div>
                      <?php } else { ?>
                        <label for="level" class="col-sm-2 col-form-label" hidden>Level</label>
                        <div class="col-sm-10">
                          <select name="level" id="level" class="form-control select2bs4" style="width: 50%;" hidden>
                            <option value="Administrator" <?php if ($row['level'] == "Administrator") echo 'selected="selected"'; ?>>Administrator</option>
                            <option value="Admin Staff" <?php if ($row['level'] == "Admin Staff") echo 'selected="selected"'; ?>>Admin Staff</option>
                            <option value="Direksi" <?php if ($row['level'] == "Direksi") echo 'selected="selected"'; ?>>Direksi</option>
                            <option value="Teknisi" <?php if ($row['level'] == "Teknisi") echo 'selected="selected"'; ?>>Teknisi</option>
                          </select>
                        </div>
                        <!-- <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                          </div> -->
                      <?php } ?>
                    </div>
                    <br>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" name="btnUpdate" class="btn btn-danger">Save Data</button>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->