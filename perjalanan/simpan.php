<?php
include 'config/database.php';

$id_perjalanan = $_POST['id_perjalanan'];
                $tempat  = $data['tempat'];
                $tanggal   = $data['tanggal'];
                $waktu   = $data['waktu'];
                $keterangan   = $data['keterangan'];
                $telp     = $data['telp'];
                $email    = $data['email'];
                $status    = $data['status'];
                $lampiran    = $data['lampiran'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
$filename = $_FILES['lampiran']['name'];
$ukuran = $_FILES['lampiran']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    header("location:?page=perjalanan-tampil&alert=1");
} else {
    if ($ukuran < 1044070) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['lampiran']['tmp_name'], 'perjalanan/gambar/' . $rand . '_' . $filename);
        mysqli_query($db, "INSERT INTO perjalanan VALUES('$id_perjalanan','$nama','$tempat','$tanggal','$waktu','$keterangan','$telp','$email','$waktu_tgl','$status','$xx')");
        header("location:?page=perjalanan-tampil&alert=2");
    } else {
        header("location:?page=perjalanan-tampil&alert=1");
    }
}
