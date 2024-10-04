<?php
$id_penugasan  = $_GET['id'];
?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input Penugasan
      </h4>
    </div> <!-- /.page-header -->

    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="?page=simpan-penugasan">


          <div class="form-group">
            <label class="col-sm-2 control-label">Perjalanan</label>
            <div class="col-sm-3">
              <select class="form-control" name="id_perjalanan" placeholder="Pilih" required>

                <?php
                $query = "SELECT * FROM perjalanan WHERE id_perjalanan = $id_penugasan";
                $result = mysqli_query($db, $query);
                foreach ($result as $data) {
                ?>

                  <option value="<?php echo $data["id_perjalanan"]; ?>"> <?php echo $data["keterangan"] . ", " . $data["tanggal"]; ?></option>

                <?php
                }
                ?>
              </select>

            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Yang Ditugaskan</label>
            <div class="col-sm-3">
              <select class="form-control" name="id_user" placeholder="Pilih" required>

                <?php
                $query = "SELECT * FROM user";
                $result = mysqli_query($db, $query);
                foreach ($result as $data) {
                ?>

                  <option value="<?php echo $data["id_user"]; ?>"> <?php echo $data["username"] . ", " . $data["bidang"]; ?></option>

                <?php
                }
                ?>
              </select>

            </div>
          </div>


          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->