<?php
include "./function/connection.php";

$query = mysqli_query($connection, "
    SELECT kelas.*, guru.nm_guru 
    FROM kelas 
    JOIN guru ON kelas.nip = guru.nip
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
                            <a href="index.php?halaman=kelas">Data Kelas</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lihat Data Kelas
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <h3 class="text-center">Data Kelas</h3>
    </div>
    <section class="section">
        <a href="index.php?halaman=tambah_kelas" class="btn btn-dark btn-sm mb-3">Tambah Data Kelas</a>
        <a href="index.php?halaman=export_kelas" target="_blank" class="btn btn-success btn-sm mb-3">Export PDF</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Tahun Ajaran</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
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
                                        <td><?= $data['kd_kelas'] ?></td>
                                        <td><?= $data['nm_kelas'] ?></td>
                                        <td><?= $data['jml_siswa'] ?></td>
                                        <td><?= $data['thn_ajaran'] ?></td>
                                        <td><?= $data['nip'] ?></td>
                                        <td><?= $data['nm_guru'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?halaman=ubah_kelas&kd_kelas=<?= $data['kd_kelas'] ?>">Ubah</a>
                                            <a class="btn btn-danger btn-sm" href="index.php?halaman=hapus_kelas&kd_kelas=<?= $data['kd_kelas'] ?>" onclick="confirmModal(event)">Hapus</a>
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
