<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

    $id_perjalanan = $_GET['id'];

    // perintah query untuk menghapus data pada tabel
    $query = mysqli_query($db, "DELETE FROM perjalanan WHERE id_perjalanan='$id_perjalanan'");

    // cek hasil query
    if ($query) {
        // jika berhasil tampilkan pesan berhasil delete data
        header('location:?page=pegawai-tampil&alert=4');
    } else {
        // jika gagal tampilkan pesan kesalahan
        header('location:?page=pegawai-tampil&alert=1');
    }
}
