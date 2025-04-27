<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_POST['submit'])) {
        $kd_kelas = $_POST['kd_kelas'];
        $nm_kelas = htmlspecialchars($_POST['nm_kelas']);
        $jml_siswa = $_POST['jml_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $nip = $_POST['nip'];

        $query = mysqli_query($connection, "
            INSERT INTO kelas (kd_kelas, nm_kelas, jml_siswa, thn_ajaran, nip) 
            VALUES ('$kd_kelas', '$nm_kelas', $jml_siswa, '$thn_ajaran', $nip)
        ");

        if ($query == TRUE) {
            $message = "Berhasil menambahkan data kelas";
            echo "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: '$message',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = 'index.php?halaman=kelas';
                })
            </script>
            ";
        } else {
            $message = "Gagal menambahkan data kelas";
            echo "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: '$message',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = 'index.php?halaman=kelas';
                })
            </script>
            ";
        }
    }
} catch (\Throwable $th) {
    echo "
    <script>
        Swal.fire({
            title: 'Gagal',
            text: 'Server error!',
            icon: 'error',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        }).then(() => {
            window.location.href = 'index.php?halaman=kelas';
        })
    </script>
    ";
}
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kelas</h3>
                <p class="text-subtitle text-muted">
                    Halaman Tambah Data Kelas
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=kelas">Kelas</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Data Kelas
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="index.php?halaman=kelas" class="btn btn-primary btn-sm mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
            <form action="" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="kd_kelas" name="kd_kelas" placeholder="Kode Kelas" required>
        <label for="kd_kelas">Kode Kelas</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nm_kelas" name="nm_kelas" placeholder="Nama Kelas" required>
        <label for="nm_kelas">Nama Kelas</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="jml_siswa" name="jml_siswa" placeholder="Jumlah Siswa" required>
        <label for="jml_siswa">Jumlah Siswa</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="thn_ajaran" name="thn_ajaran" placeholder="Tahun Ajaran (contoh: 2024/2025)" required>
        <label for="thn_ajaran">Tahun Ajaran</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" name="nip" id="nip" required>
            <option value="">Pilih Guru Wali</option>
            <?php
            $guruQuery = mysqli_query($connection, "SELECT * FROM guru");
            while ($guru = mysqli_fetch_assoc($guruQuery)) {
                echo "<option value='{$guru['nip']}'>{$guru['nm_guru']} - {$guru['nip']}</option>";
            }
            ?>
        </select>
        <label for="nip">Guru Wali</label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
</form>

            </div>
        </div>
    </section>
</div>