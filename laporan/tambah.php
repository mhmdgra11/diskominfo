<?php
$id_penugasan  = $_GET['id'];
?>

<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Laporan
        </h4>
      </div> <!-- /.page-header -->


      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="?page=simpan-laporan" enctype="multipart/form-data">
          <div class="form-group">
              <label class="col-sm-2 control-label">Perjalanan</label>
              <div class="col-sm-3">
          <?php
      $query = "SELECT * from penugasan WHERE id_penugasan = $id_penugasan";
      $result = mysqli_query($db, $query);
      foreach ($result as $data)
      $id_penugasan = $data['id_penugasan'];
      {
      ?>
             
             <div class="form-group">
              <div class="col-sm-3">
                <input type="text" class="form-control" name="id_penugasan"  autocomplete="off" value="<?php echo $id_penugasan; ?>" readonly>
              </div>
            </div>
    
<?php
      }
      ?>
</div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="tanggal" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-3">
                <select class="form-control" name="ket" placeholder="Pilih level" required>
                  <option value=""></option>
                  <option value="Selesai">Selesai</option>
                  <option value="Delay">Delay</option>
                  <option value="Batal">Batal</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="foto" autocomplete="off" required>
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