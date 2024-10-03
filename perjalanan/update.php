<?php
// memanggil file koneksi.php untuk melakukan koneksi database
require_once 'config/database.php';

// membuat variabel untuk menampung data dari form
$id_perjalanan        = $_POST['id_perjalanan'];
$nama       = $_POST['nama'];
$tempat    = $_POST['tempat'];
$waktu_tgl     = $_POST['waktu_tgl'];
$telp       = $_POST['telp'];
$email      = $_POST['email'];
$foto       = $_FILES['foto']['name'];

//cek dulu jika merubah foto id_perjalanan jalankan coding ini
if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'pdf'); //ekstensi file foto yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_foto_baru = $angka_acak . '-' . $foto; //menggabungkan angka acak dengan nama file sebenarnya

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'id_perjalanan/gambar/' . $nama_foto_baru); //memindah file foto ke folder foto

        // jalankan query UPDATE berdasarkan id_perjalanan yang id_perjalanannya kita edit
        $query  = "UPDATE id_perjalanan SET nama = '$nama', tempat = '$tempat', waktu_tgl = '$waktu_tgl', telp = '$telp', email = '$email', foto = '$nama_foto_baru'";
        $query .= "WHERE id_perjalanan = '$id_perjalanan'";
        $result = mysqli_query($db, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($db) .
                " - " . mysqli_error($db));
        } else {
            echo "<script>window.location='?page=id_perjalanan-tampil&alert=3';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>window.location='?page=id_perjalanan-tampil&alert=5';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan id_perjalanan yang id_perjalanannya kita edit
    $query  = "UPDATE id_perjalanan SET nama = '$nama', tempat = '$tempat', waktu_tgl = '$waktu_tgl', telp = '$telp', email = '$email'";
    $query .= "WHERE id_perjalanan = '$id_perjalanan'";
    $result = mysqli_query($db, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($db) .
            " - " . mysqli_error($db));
    } else {
        echo "<script>window.location='?page=id_perjalanan-tampil&alert=3';</script>";
    }
}
