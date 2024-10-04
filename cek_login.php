<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require_once "config/database.php";

// menangkap data yang dikirim dari form login
$id_user = $_POST['id_user'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db, "select * from user where id_user='$id_user' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['id_user'] = $id_user;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:index.php");

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "pegawai") {
        // buat session login dan username
        $_SESSION['id_user'] = $id_user;
        $_SESSION['level'] = "pegawai";
        // alihkan ke halaman dashboard pegawai
        header("location:index.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
    }
} else {
    header("location:login.php?pesan=gagal");
}
