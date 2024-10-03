<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <center>
                <h4>
                    <b>Kirim Detail Data Karyawan</b>
                </h4>
            </center>
        </div> <!-- /.page-header -->
        <?php
        if (isset($_GET['id'])) {
            $id_perjalanan   = $_GET['id'];
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


        <div class="form-group">
            <center>

                <a href="https://api.whatsapp.com/send?phone=628115402372&text=<?php echo "*DETAIL DATA PEGAWAI*" .  "%0Aid_perjalanan : " . $id_perjalanan . "%0ANama Karyawan : " . $nama . "%0Atempat : " . $tempat . "%0Awaktu_tgl : " . $waktu_tgl . "%0ANo. Telp : " . $telp . "%0AEmail : " . $email . "%0AFoto : " . $foto; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> Admin </a>

                <a href="https://api.whatsapp.com/send?phone=<?php echo $telp; ?>&text=<?php echo "*DETAIL DATA PEGAWAI*" .  "%0Aid_perjalanan : " . $id_perjalanan . "%0ANama Karyawan : " . $nama . "%0Atempat : " . $tempat . "%0Awaktu_tgl : " . $waktu_tgl . "%0ANo. Telp : " . $telp . "%0AEmail : " . $email . "%0AFoto : " . $foto; ?>" class=" btn btn-default" target="_blank"><i class="glyphicon glyphicon-share"></i> <?php echo $nama; ?> </a>

            </center>
        </div>

        <div class="form-group">
            <center>
                <a href="?page=pegawai-tampil" class="btn btn-default">Kembali</a>
            </center>
        </div>


    </div>
    </form>


</div> <!-- /.panel-body -->
</div> <!-- /.panel -->
</div> <!-- /.col -->
</div> <!-- /.row -->