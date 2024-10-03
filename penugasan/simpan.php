<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	$id_user  	   = $_POST['id_user'];
	$id_perjalanan = $_POST['id_perjalanan'];
	

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO penugasan (id_user,id_perjalanan) VALUES('$id_user','$id_perjalanan')");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location:?page=perjalanan-tampil&alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
