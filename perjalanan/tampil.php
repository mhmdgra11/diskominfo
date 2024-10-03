<?php
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
} else {
    $cari = "";
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">

            <a class="btn btn-info" href="?page=perjalanan-tambah">
                <i class="glyphicon glyphicon-plus"></i> Tambah
            </a>

            <div class="pull-right btn-tambah">
                <form class="form-inline" method="POST" action="?page=perjalanan-tampil">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-search"></i>
                            </div>
                            <input type="text" class="form-control" name="cari" placeholder="Cari ..." autocomplete="off" value="<?php echo $cari; ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data perjalanan berhasil disimpan.
          </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data perjalanan berhasil diubah.
          </div>";
        } elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data perjalanan berhasil dihapus.
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
                <h3 class="panel-title">Data perjalanan</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>keterangan</th>
                                <th>Tempat</th>
                                <th>Waktu</th>
                                <th class='center'>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            /* Pagination */
                            $batas = 10;

                            if (isset($cari)) {
                                $jumlah_record = mysqli_query($db, "SELECT * FROM perjalanan WHERE id_perjalanan LIKE '%$cari%' OR keterangan LIKE '%$cari%'") or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
                            } else {
                                $jumlah_record = mysqli_query($db, "SELECT * FROM perjalanan") or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
                            }

                            $jumlah  = mysqli_num_rows($jumlah_record);
                            $halaman = ceil($jumlah / $batas);
                            $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                            $mulai   = ($page - 1) * $batas;
                            /*-------------------------------------------------------------------*/
                            $no = 1;
                            if (isset($cari)) {
                                $query = mysqli_query($db, "SELECT * FROM perjalanan WHERE id_perjalanan LIKE '%$cari%' OR keterangan LIKE '%$cari%' ORDER BY id_perjalanan LIMIT $mulai, $batas")
                                    or die('Ada kesalahan pada query perjalanan: ' . mysqli_error($db));
                            } else {
                                $query = mysqli_query($db, "SELECT * FROM perjalanan ORDER BY id_perjalanan LIMIT $mulai, $batas") or die('Ada kesalahan pada query perjalanan: ' . mysqli_error($db));
                            }

                            while ($data = mysqli_fetch_assoc($query)) {

                                echo "  <tr>
                      <td width='20'>$no</td>
                      <td width='150'>$data[jenis_tugas] - $data[keterangan]</td>
                      <td width='150'>$data[tempat]</td>
                      <td width='150'>$data[tanggal] - $data[waktu]</td>
                      <td width='150' class='center'>
                        <div class=''>

                       <a data-toggle='tooltip' data-placement='top' title='Penugasan' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=tambah-penugasan&id=$data[id_perjalanan]'> <i class='glyphicon glyphicon-plus'></i></a>

                        <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=perjalanan-detail&id=$data[id_perjalanan]'> <i class='glyphicon glyphicon-eye-open'></i> </a> 

                        <a data-toggle='tooltip' data-placement='top' title='Print' style='margin-right:5px' class='btn btn-warning btn-sm' href='?page=perjalanan-print-detail&id=$data[id_perjalanan]' target='_blank'> <i class='glyphicon glyphicon-print'></i> </a>

                        <a data-toggle='tooltip' data-placement='top' title='Edit' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=perjalanan-edit&id=$data[id_perjalanan]'> <i class='glyphicon glyphicon-edit'></i></a>
                        
                        <a data-toggle='tooltip' data-placement='top' title='Kirim' style='margin-right:5px' class='btn btn-info btn-sm' href='?page=perjalanan-kirim&id=$data[id_perjalanan]'><i class='glyphicon glyphicon-share'></i></a>  
                                                
                                                ";

                            ?>
                                <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="?page=perjalanan-hapus&id=<?php echo $data['id_perjalanan']; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['keterangan']; ?>?');"> <i class="glyphicon glyphicon-trash"></i></a>
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
                                    <a href="?page=perjalanan-tampil&hal=<?php echo $page - 1 ?>" aria-label="Previous">
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
                                    <a href="?page=perjalanan-tampil&hal=<?php echo $x ?>"><?php echo $x ?></a>
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
                                    <a href="?page=perjalanan-tampil&hal=<?php echo $page + 1 ?>" aria-label="Next">
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