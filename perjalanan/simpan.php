<?php
include 'config/database.php';

$id_perjalanan = $_POST['id_perjalanan'];
                $tempat  = $_POST['tempat'];
                $tanggal   = $_POST['tanggal'];
                $waktu   = $_POST['waktu'];
                $jenis_tugas   = $_POST['jenis_tugas'];
                $keterangan   = $_POST['keterangan'];
                $status    = $_POST['status'];
                $lampiran    = $_POST['lampiran'];

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
        mysqli_query($db, "INSERT INTO perjalanan VALUES('$id_perjalanan','$tempat','$tanggal','$waktu','$jenis_tugas','$keterangan','$status','$xx')");
        header("location:?page=perjalanan-tampil&alert=2");
    } else {
        header("location:?page=perjalanan-tampil&alert=1");
    }
}
