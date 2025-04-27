<?php
include "./function/connection.php";

$query = mysqli_query($connection, "SELECT * FROM matpel");
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
                            <a href="index.php?halaman=matpel">Mata Pelajaran</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Lihat Data Mata Pelajaran
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <h3 class="text-center">Data Mata Pelajaran</h3>
    </div>
    <section class="section">
        <a href="index.php?halaman=tambah_matpel" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mata Pelajaran</th>
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
                                        <td><?= $data['nm_matpel'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="index.php?halaman=ubah_matpel&kd_matpel=<?= $data['kd_matpel'] ?>">Ubah</a>
                                            <a class="btn btn-danger btn-sm" id="btn-hapus" href="index.php?halaman=hapus_matpel&kd_matpel=<?= $data['kd_matpel'] ?>" onclick="confirmModal(event)">Hapus</a>
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