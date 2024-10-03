<?php
// Panggil koneksi database
include 'config/database.php';
var_dump($db); // Untuk debugging


if (isset($_POST['simpan'])) {
	$id_user        = mysqli_real_escape_string($db, trim($_POST['id_user']));
		$username  = mysqli_real_escape_string($db, trim($_POST['username']));
		$password  = mysqli_real_escape_string($db, trim($_POST['password']));
		$jabatan       = $_POST['jabatan'];
		$bidang        = $_POST['bidang'];
		$telp          = $_POST['telp'];
		$email          = $_POST['email'];
		$level    	   = $_POST['level'];
		$nip      	   = mysqli_real_escape_string($db, trim($_POST['nip']));


	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO user( id_user, username, password, jabatan, bidang, telp, email , level, nip)					    												 													
										  VALUES ('$id_user', '$username', '$password','$jabatan','$bidang','$telp','$email', '$level', '$nip')");	 
													 
													 
													 

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}
}
