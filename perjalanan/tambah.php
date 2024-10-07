<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Input Data Perjalanan
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
        <form class="form-horizontal" method="POST" action="?page=perjalanan-simpan" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">ID Perjalanan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="id_perjalanan" maxlength="255" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="tanggal" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Waktu</label>
              <div class="col-sm-3">
                <input type="time" class="form-control" name="waktu" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="keterangan" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Tugas</label>
              <div class="col-sm-3">
                <select class="form-control" name="jenis_tugas" placeholder="Pilih Tugas" required>
                  <option value=""></option>
                  <option value="admin">giat_liputan</option>
                  <option value="pegawai">seminar</option>
                  <option value="pegawai">sosialisasi</option>
                  <option value="pegawai">rapat</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-3">
                <select class="form-control" name="status" placeholder="Pilih status" required>
                  <option value=""></option>
                  <option value="selesai">Selesai</option>
                  <option value="delay">Delay</option>
                  <option value="batal">Batal</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
                        <label class="col-sm-2 control-label">LAMPIRAN</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="lampiran" autocomplete="off" required>
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