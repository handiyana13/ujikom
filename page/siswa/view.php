<?php
include "./function/connection.php";

// Query untuk mengambil data siswa beserta informasi kelas
$query = mysqli_query($connection, "
    SELECT siswa.*, kelas.nm_kelas 
    FROM siswa 
    JOIN kelas ON siswa.kd_kelas = kelas.kd_kelas
");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=siswa">Data Siswa</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lihat Data Siswa
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <h3 class="text-center">Data Siswa</h3>
    </div>
    <section class="section">
        <a href="index.php?halaman=tambah_siswa" class="btn btn-dark btn-sm mb-3">Tambah Data Siswa</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Nama Wali</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($query->num_rows > 0) : ?>
                                <?php
                                $i = 1;
                                while ($data = mysqli_fetch_assoc($query)) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $data['nis'] ?></td>
                                        <td><?= $data['nm_siswa'] ?></td>
                                        <td><?= $data['tmp_lahir'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tgl_lahir'])) ?></td>
                                        <td><?= $data['jkel'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['telp'] ?></td>
                                        <td><?= $data['nm_wali'] ?></td>
                                        <td><?= $data['kd_kelas'] ?></td>
                                        <td><?= $data['nm_kelas'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?halaman=ubah_siswa&nis=<?= $data['nis'] ?>">Ubah</a>
                                            <a class="btn btn-danger btn-sm" id="btn-hapus" href="index.php?halaman=hapus_siswa&nis=<?= $data['nis'] ?>" onclick="confirmModal(event)">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="./assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="./assets/static/js/pages/simple-datatables.js"></script>
