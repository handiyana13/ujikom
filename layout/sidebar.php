<?php
$beranda = false;
$kontak = false;
$tambah = false;
$ubah = false;
$guru = false;
$tambah_guru = false;
$ubah_guru = false;
$matpel = false;
$tambah_matpel = false;
$ubah_matpel = false;
$kelas = false;
$tambah_kelas = false;
$ubah_kelas = false;
$siswa = false;
$tambah_siswa = false;
$ubah_siswa = false;

if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
    switch ($halaman) {
        case 'beranda':
            $beranda = true;
            break;
        case 'kontak':
            $kontak = true;
            break;
        case 'tambah_kontak':
            $tambah = true;
            break;
        case 'ubah_kontak':
            $ubah = true;
            break;
        case 'guru':
            $guru = true;
            break;
        case 'tambah_guru':
            $tambah_guru = true;
            break;
        case 'ubah_guru':
            $ubah_guru = true;
            break;
        case 'matpel':
            $matpel = true;
            break;        
        case 'tambah_matpel':
            $tambah_matpel = true;
            break;
        case 'ubah_matpel':
            $ubah_matpel = true;
            break;
        case 'kelas':
            $kelas = true;
            break;
        case 'tambah_kelas':
            $tambah_kelas = true;
            break;
        case 'ubah_kelas':
            $ubah_kelas = true;
            break; 
        case 'siswa':
            $siswa = true;
            break;
        case 'tambah_siswa':
            $tambah_siswa = true;
            break;
        case 'ubah_siswa':
            $ubah_siswa = true;
            break; 
        default:
            $beranda = false;
            $kontak = false;
            $tambah = false;
            $ubah = false;
            $guru = false;
            $tambah_guru = false;
            $ubah_guru = false;
            $matpel = false;            
            $tambah_matpel = false;
            $ubah_matpel = false;
            $kelas = false;
            $tambah_kelas = false;
            $ubah_kelas = false;
            $siswa = false;
            $tambah_siswa = false;
            $ubah_siswa = false;
    }
} else {
    $beranda = false;
    $kontak = false;
    $tambah = false;
    $ubah = false;
    $guru = false;
    $tambah_guru = false;
    $ubah_guru = false;
    $matpel = false;            
    $tambah_matpel = false;
    $ubah_matpel = false;
    $kelas = false;
    $tambah_kelas = false;
    $ubah_kelas = false;
    $siswa = false;
    $tambah_siswa = false;
    $ubah_siswa = false;
}

?>

<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="index.php?halaman=beranda"><h3>SMA NEGERI 91</h3></a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= $beranda ? 'active' : '' ?>">
                    <a href="index.php?halaman=beranda" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php if (isset($_SESSION['nama'])) : ?>
                    <li class="sidebar-title">Data</li>
                    <li class="sidebar-item <?= $kontak || $tambah || $ubah ? 'active' : '' ?>">
                        <a href="index.php?halaman=kontak" class="sidebar-link">
                            <i class="bi bi-person-fill"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $siswa || $tambah_siswa || $ubah_siswa ? 'active' : '' ?>">
                        <a href="index.php?halaman=siswa" class="sidebar-link">
                            <i class="bi bi-file-person"></i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $guru || $tambah_guru || $ubah_guru ? 'active' : '' ?>">
                        <a href="index.php?halaman=guru" class="sidebar-link">
                            <i class="bi bi-person-circle"></i>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $matpel || $tambah_matpel || $ubah_matpel ? 'active' : '' ?>">
                        <a href="index.php?halaman=matpel" class="sidebar-link">
                            <i class="bi bi-book"></i>
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $kelas || $tambah_kelas || $ubah_kelas ? 'active' : '' ?>">
                        <a href="index.php?halaman=kelas" class="sidebar-link">
                            <i class="bi bi-square"></i>
                            <span>Kelas</span>
                        </a>
                    </li>
                <?php else : ?>
                <?php endif ?>

                <!-- <li class="sidebar-title">Collapse</li>

                <li
                    class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-123"></i>
                        <span>Layouts</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item  ">
                            <a href="layout-default.html" class="submenu-link">Default Layout</a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="layout-vertical-1-column.html" class="submenu-link">1 Column</a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="layout-vertical-navbar.html" class="submenu-link">Vertical Navbar</a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="layout-rtl.html" class="submenu-link">RTL Layout</a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="layout-horizontal.html" class="submenu-link">Horizontal Menu</a>

                        </li>

                    </ul>


                </li> -->

            </ul>
        </div>
    </div>
</div>