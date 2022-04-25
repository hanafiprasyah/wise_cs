<form action="../../database/configures/login_config.php" method="POST">
    <div class="card-body">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $_GET['error']; ?></strong>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="username">Username</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" autocomplete="off" name="username" id="username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
        <div class="form-group">
            <label for="captcha">Captcha</label>
            <div class="input-group-mb3">
                <?php
                $min_number = 1;
                $max_number = 10;
                $random1 = mt_rand($min_number, $max_number);
                $random2 = mt_rand($min_number, $max_number);

                echo $random1 . ' + ' . $random2 . ' = ';
                ?>
                <input type='number' class="form-control" name='result' autocomplete='off' required />
                <input type='hidden' value='<?php echo $random1; ?>' name='angka1' autocomplete='off' readonly />
                <input type='hidden' value='<?php echo $random2; ?>' name='angka2' autocomplete='off' readonly />
            </div>
        </div>
    </div>
    <!-- LOGIN BUTTON -->
    <div class="col-12">
        <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
    </div>
</form>