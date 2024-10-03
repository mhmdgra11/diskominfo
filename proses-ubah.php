<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['id_user'])) {
		$id_user        = mysqli_real_escape_string($db, trim($_POST['id_user']));
		$username  = mysqli_real_escape_string($db, trim($_POST['username']));
		$password  = mysqli_real_escape_string($db, trim($_POST['password']));
		$jabatan       = $_POST['jabatan'];
		$bidang        = $_POST['bidang'];
		$telp          = $_POST['telp'];
		$email          = $_POST['email'];
		$level    	   = $_POST['level'];
		$nip      	   = mysqli_real_escape_string($db, trim($_POST['nip']));

		// perintah query untuk mengubah data pada tabel is_siswa
		$query = mysqli_query($db, "UPDATE user SET username 		= '$username',
														password 	= '$password',
														jabatan 	= '$jabatan',
														bidang 		= '$bidang',
														telp 		= '$telp', 
														email 		= '$email',
														level 		= '$level',
														nip 		= '$nip'
												  WHERE id_user     = '$id_user'");
		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}
	}
}
