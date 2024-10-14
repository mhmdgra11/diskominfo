<?php

// Data user (pegawai)

if (empty($_GET["page"])) {
    include "tampil-data.php";
} elseif ($_GET['page'] == 'tambah') {
    include "form-tambah.php";
} elseif ($_GET['page'] == 'ubah') {
    include "form-ubah.php";
} elseif ($_GET['page'] == 'detail') {
    include "detail.php";

    // perjalanan

} elseif ($_GET['page'] == 'perjalanan-tampil') {
    include "perjalanan/tampil.php";
} elseif ($_GET['page'] == 'perjalanan-tambah') {
    include "perjalanan/tambah.php";
} elseif ($_GET['page'] == 'perjalanan-simpan') {
    include "perjalanan/simpan.php";
} elseif ($_GET['page'] == 'perjalanan-detail') {
    include "perjalanan/detail.php";
} elseif ($_GET['page'] == 'perjalanan-edit') {
    include "perjalanan/edit.php";
} elseif ($_GET['page'] == 'perjalanan-update') {
    include "perjalanan/update.php";
} elseif ($_GET['page'] == 'perjalanan-hapus') {
    include "perjalanan/hapus.php";
} elseif ($_GET['page'] == 'perjalanan-print-detail') {
    include "perjalanan/print-detail.php";
} elseif ($_GET['page'] == 'perjalanan-kirim') {
    include "perjalanan/kirim.php";
}

// penugasan


elseif ($_GET['page'] == 'tambah-penugasan') {
    include "penugasan/tambah.php";
} elseif ($_GET['page'] == 'simpan-penugasan') {
    include "penugasan/simpan.php";
} elseif ($_GET['page'] == 'hapus-penugasan') {
    include "penugasan/php";
}

// laporan
else if ($_GET['page'] == 'tampil-laporan') {
    include "laporan/tampil-laporan.php";
}