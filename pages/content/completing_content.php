<div class="card shadow-lg p-3 mb-5 bg-white rounded">
  <div class="card-body">
    <form class="form-horizontal" action="../../database/configures/completing_data.php" method="POST">
      <br>
      <h4 class="text-center">Please Complete your account</h4>
      <br>
      <div class="form-group row">
        <label for="email">Email</label>
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $row['id_user']; ?>" required>
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email?" required>
      </div>
      <div class="form-group row">
        <label for="alamat">Address</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Your address?" required>
      </div>
      <div class="form-group row">
        <label for="moto_hidup">Motto</label>
        <input type="text" class="form-control" id="moto_hidup" name="moto_hidup" placeholder="Your motto?" required>
      </div>
      <button type="submit" name="btnCompleting" id="btnCompleting" class="btn btn-block bg-gradient-success">Save Data</button>
      <br>
      <br>
    </form>
  </div>
</div>