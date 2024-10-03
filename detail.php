<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Detail Data Karyawan
            </h4>
        </div> <!-- /.page-header -->
        <?php
        if (isset($_GET['id'])) {
            $id_user   = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM user WHERE id_user='$id_user'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $id_user      = $data['id_user'];
                $username     = $data['username'];
                $password     = $data['password'];
                $jabatan      = $data['jabatan'];
                $bidang       = $data['bidang'];
                $telp         = $data['telp'];
                $email        = $data['email'];
                $level        = $data['level'];
                $nip          = $data['nip'];
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active"><b>DETAIL DATA KARYAWAN</b></li>
            <li class="list-group-item">ID_User : <b><?php echo $id_user; ?></b></li>
            <li class="list-group-item">Username : <b><?php echo $username; ?></b></li>
            <li class="list-group-item">Jabatan : <b><?php echo $jabatan; ?></b></li>
            <li class="list-group-item">Bidang : <b><?php echo $bidang; ?></b></li>
            <li class="list-group-item">No. Telp : <b><?php echo $telp; ?></b></li>
            <li class="list-group-item">email : <b><?php echo $email; ?></b></li>
            <li class="list-group-item">Level : <b><?php echo $level; ?></b></li>
            <li class="list-group-item">NIP : <b><?php echo $nip; ?></b></li>
        </ul>

        <div class="form-group">
            <a href="index.php" class="btn btn-default btn-reset">Kembali</a>
        </div>
    </div>
    </form>
</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->