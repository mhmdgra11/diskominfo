<?php
if (isset($_GET['id'])) {
    $id_perjalanan   = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM perjalanan WHERE id_perjalanan='$id_perjalanan'") or die('Query Error : ' . mysqli_error($db));
    while ($data  = mysqli_fetch_assoc($query)) {
        $id_perjalanan      = $data['id_perjalanan'];
        $tempat  = $data['tempat'];
        $tanggal   = $data['tanggal'];
        $waktu   = $data['waktu'];
        $keterangan   = $data['keterangan'];
        $telp     = $data['telp'];
        $email    = $data['email'];
        $status    = $data['status'];
        $lampiran    = $data['lampiran'];
        
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <br>
        <form class="form-horizontal" method="POST" action="?page=pegawai-update" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label">ID_perjalanan</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="id_perjalanan" value="<?php echo $id_perjalanan; ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tempat</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tempat" value="<?php echo $nama; ?>" Required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="tanggal" value="<?php echo $nama; ?>" Required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pukul</label>
                <div class="col-sm-2">
                    <input type="time" class="form-control" name="waktu" value="<?php echo $nama; ?>" Required>
                </div>
            </div>

            
            <div class="form-group">
                        <label class="col-sm-2 control-label">STATUS</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="status" placeholder="Pilih Keterangan" required>
                                <option value="selesai">Selesai</option>
                                <option value="delay">Delay</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>
                    </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">No Telp</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="telp" autocomplete="off" value="<?php echo $telp; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-2">
                    <input class="form-control" name="email" autocomplete="off" value="<?php echo $email; ?>" required>
                </div>
            </div>

            <div class="form-group">
                        <label class="col-sm-2 control-label">LAMPIRAN</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="lampiran" autocomplete="off" required>
                        </div>
                    </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-info btn-submit" name="update" value="Update">
                </div>
            </div>
        </form>
        <a href="?page=pegawai-tampil" class="btn btn-default btn-reset">Kembali</a>

        <hr>
    </div>
</div>


</div> <!-- /.col -->
</div> <!-- /.row -->