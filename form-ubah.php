  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Ubah Data User
        </h4>
      </div> <!-- /.page-header -->
      <?php
      if (isset($_GET['id'])) {
        $id_user  = $_GET['id'];
        $query = mysqli_query($db, "SELECT * FROM user WHERE id_user='$id_user'") or die('Query Error : ' . mysqli_error($db));
        while ($data  = mysqli_fetch_assoc($query)) {
          $id_user   = $data['id_user'];
          $username  = $data['username'];
          $password  = $data['password'];
          $jabatan   = $data['jabatan'];
          $bidang    = $data['bidang'];
          $telp      = $data['telp'];
          $email     = $data['email'];
          $level     = $data['level'];
          $nip       = $data['nip'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="proses-ubah.php">

            <div class="form-group">
              <label class="col-sm-2 control-label">ID_KARYAWAN</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="id_user" value="<?php echo $id_user; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="username" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-3">
                <input type="password" class="form-control" name="password" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-2">
                    <select class="form-control" name="jabatan" placeholder="Pilih Jabatan" required>
                        <option value="<?php echo $jabatan; ?>"><?php echo $jabatan; ?></option>
                        <option value="KADIS">KADIS</option>
                        <option value="SEKDIS">SEKDIS</option>
                        <option value="KABID">Kabid</option>
                        <option value="PEGAWAI">Pegawai</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                        <label class="col-sm-2 control-label">Bidang</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="bidang" placeholder="Pilih Bidang" required>
                                <option value="UMUM">UMUM</option>
                                <option value="KOMUNIKASI">KOMUNIKASI</option>
                                <option value="SERVER">SERVER</option>
                                <option value="PERSANDIAN">PERSANDIAN</option>
                                <option value="KEUANGAN">KEUANGAN</option>
                                <option value="INFORMATIKA">INFORMATIKA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telp</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="telp" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="email" autocomplete="off" required>
                        </div>
                    </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Level</label>
              <div class="col-sm-3">
                <select class="form-control" name="level" placeholder="Pilih Level" required>
                  <option value=""></option>
                  <option value="admin">Admin</option>
                  <option value="pegawai">Karyawan</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nip" required>
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