<?php

if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
    switch ($halaman) {
        case 'beranda':
            include "page/index.php";
            break;
        case 'logout':
            include "page/logout.php";
            break;
        case 'kontak':
            include "page/contact/view.php";
            break;
        case 'tambah_kontak':
            include "page/contact/add.php";
            break;
        case 'ubah_kontak':
            include "page/contact/edit.php";
            break;
        case 'hapus_kontak':
            include "page/contact/delete.php";
            break;
        case 'guru':
            include "page/guru/view.php";
            break;
        case 'tambah_guru':
            include "page/guru/add.php";
            break;
        case 'ubah_guru':    
            include "page/guru/edit.php";
            break;
        case 'hapus_guru':
            include "page/guru/delete.php";
            break;
        case 'matpel':
            include "page/matpel/view.php";
            break;
        case 'tambah_matpel':
            include "page/matpel/add.php";
            break;
        case 'ubah_matpel':
            include "page/matpel/edit.php";
            break;
        case 'hapus_matpel':
            include "page/matpel/delete.php";
            break;
        case 'kelas':
            include "page/kelas/view.php";
            break;
        case 'tambah_kelas':
            include "page/kelas/add.php";
            break;
        case 'ubah_kelas':
            include "page/kelas/edit.php";
            break;
        case 'hapus_kelas':
            include "page/kelas/delete.php";
            break;
        case 'siswa':
            include "page/siswa/view.php";
            break;
        case 'tambah_siswa':
            include "page/siswa/add.php";
            break;
        case 'ubah_siswa':
            include "page/siswa/edit.php";
            break;
        case 'hapus_siswa':
            include "page/siswa/delete.php";
            break;
        case 'export_kelas':
            include "page/kelas/export_kelas.php";
            exit();
            break;
        default:
            include "page/error.php";
    }
} else {
    include "page/index.php";
}
