<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_GET['id'])) {

	$id_user = $_GET['id'];

	// perintah query untuk menghapus data pada tabel
	$query = mysqli_query($db, "DELETE FROM user WHERE id_user='$id_user'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: index.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
