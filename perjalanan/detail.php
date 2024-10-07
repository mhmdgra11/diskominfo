<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Detail data 
            </h4>
        </div> <!-- /.page-header -->
        <?php
        if (isset($_GET['id'])) {
            $id_perjalanan  = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM perjalanan WHERE id_perjalanan='$id_perjalanan'") or die('Query Error : ' . mysqli_error($db));
            while ($data  = mysqli_fetch_assoc($query)) {
                $id_perjalanan   = $data['id_perjalanan'];
                $tempat  = $data['tempat'];
                $tanggal   = $data['tanggal'];
                $waktu   = $data['waktu'];
                $keterangan   = $data['keterangan'];
                $status   = $data['status'];
                $lampiran   = $data['lampiran'];
                
            }
        }
        ?>

        <ul class="list-group">
            <li class="list-group-item active">DETAIL PERJALANAN</li>
            <li class="list-group-item"> ID_PERJALANAN : <?php echo $id_perjalanan; ?></li>
            <li class="list-group-item"> TANGGAL : <?php echo $tanggal; ?></li>
            <li class="list-group-item"> WAKTU : <?php echo $waktu; ?></li>
            <li class="list-group-item"> TEMPAT : <?php echo $tempat; ?></li>
            <li class="list-group-item"> KETERANGAN : <?php echo $keterangan; ?></li>
            <li class="list-group-item"> STATUS : <?php echo $status; ?></li>
            <li class="list-group-item"> LAMPIRAN : <?php echo $lampiran; ?></li>
            <li class="list-group-item"> YANG DITUGASKAN : 
            <?php
      $query = "SELECT penugasan.*, user.username FROM penugasan JOIN user ON user.id_user = penugasan.id_user WHERE id_perjalanan = $id_perjalanan";
  
      $result = mysqli_query($db, $query); 
      
      foreach ($result as $data) {
        $username = $data['username'];
      ?>
      
        <?php echo $username; ?>

      <?php
      }
      ?>
      </li>
          
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