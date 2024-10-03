<div class="row">
    <div class="col-md-12">
<br>
        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 1) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data penugasan berhasil disimpan.
          </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data penugasan berhasil diubah.
          </div>";
        } elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data penugasan berhasil dihapus.
          </div>";
        } elseif ($_GET['alert'] == 5) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Hampura mang euy!</strong> Kedahna tipe file na jpg, jpeg, png atanapi pdf.
          </div>";
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Data Laporan</b> <?php echo $_SESSION['id_user'] ." - ". $_SESSION['level']; ?></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Laporan</th>
                                <th>Penugasan</th>
                                <th>Tanggal</th>
                                <th class='center'>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            /* Pagination */
                            $batas = 10;
                            $idu = $_SESSION['id_user'];


                            $jumlah_record = mysqli_query($db, "SELECT * from laporan ") or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));

                            $jumlah  = mysqli_num_rows($jumlah_record);
                            $halaman = ceil($jumlah / $batas);
                            $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                            $mulai   = ($page - 1) * $batas;
                            /*-------------------------------------------------------------------*/
                            $no = 1;

                            $query = mysqli_query($db, "SELECT * from laporan ORDER BY id_penugasan LIMIT $mulai, $batas  ") or die('Ada kesalahan pada query penugasan: ' . mysqli_error($db));

                            while ($data = mysqli_fetch_assoc($query)) {

                                echo "  <tr>
                      <td width='20'>$no</td>
                      <td width='150'>$data[id_laporan]</td>
                      <td width='150'>$data[id_penugasan]</td>
                      <td width='150'>$data[tanggal]</td>
                      <td width='150' class='center'>
                        <div class=''>

                       <a data-toggle='tooltip' data-placement='top' title='Edit' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=tambah-laporan&id=$data[id_penugasan]'> <i class='glyphicon glyphicon-plus'></i></a>";?>
                            <?php
                                echo "
                        </div>
                      </td>
                    </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if (empty($_GET['hal'])) {
                        $halaman_aktif = '1';
                    } else {
                        $halaman_aktif = $_GET['hal'];
                    }
                    ?>

                    <a>
                        Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
                        Total <?php echo $jumlah; ?> data
                    </a>

                    <nav>
                        <ul class="pagination pull-right">
                            <!-- Button untuk halaman sebelumnya -->
                            <?php
                            if ($halaman_aktif <= '1') { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            } else { ?>
                                <li>
                                    <a href="?page=penugasan-tampil&hal=<?php echo $page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                            <!-- Link halaman 1 2 3 ... -->
                            <?php
                            for ($x = 1; $x <= $halaman; $x++) { ?>
                                <li class="">
                                    <a href="?page=penugasan-tampil&hal=<?php echo $x ?>"><?php echo $x ?></a>
                                </li>
                            <?php
                            }
                            ?>

                            <!-- Button untuk halaman selanjutnya -->
                            <?php
                            if ($halaman_aktif >= $halaman) { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php
                            } else { ?>
                                <li>
                                    <a href="?page=penugasan-tampil&hal=<?php echo $page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->