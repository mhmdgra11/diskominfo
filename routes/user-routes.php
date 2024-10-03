<?php

// Data user (pegawai)
if (empty($_GET["page"])) {
    include "laporan/tampil-penugasan.php";

// laporan
}else if ($_GET['page'] == 'tampil-penugasan') {
    include "laporan/tampil-penugasan.php";
}else if ($_GET['page'] == 'tambah-laporan') {
    include "laporan/tambah.php";
} else if ($_GET['page'] == 'simpan-laporan') {
    include "laporan/simpan.php";
} else if ($_GET['page'] == 'hapus-laporan') {
    include "laporan/php";
}else if ($_GET['page'] == 'tampil-laporan') {
    include "laporan/tampil-laporan.php";
}

