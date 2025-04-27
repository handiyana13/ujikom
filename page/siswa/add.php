<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nm_siswa = htmlspecialchars($_POST['nm_siswa']);
        $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
        $tgl_lahir = $_POST['tgl_lahir'];
        $jkel = $_POST['jkel'];
        $alamat = htmlspecialchars($_POST['alamat']);
        $telp = htmlspecialchars($_POST['telp']);
        $nm_wali = htmlspecialchars($_POST['nm_wali']);
        $kd_kelas = $_POST['kd_kelas'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = mysqli_query($connection, "INSERT INTO siswa (nis, nm_siswa, tmp_lahir, tgl_lahir, jkel, alamat, telp, nm_wali, kd_kelas, username, password) 
        VALUES ('$nis', '$nm_siswa', '$tmp_lahir', '$tgl_lahir', '$jkel', '$alamat', '$telp', '$nm_wali', '$kd_kelas', '$username', '$password')");

        if ($query == TRUE) {
            $message = "Berhasil menambahkan data siswa";
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
            window.location.href = 'index.php?halaman=siswa';
        })
        </script>
        ";
        } else {
            $message = "Gagal menambahkan data siswa";
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
            window.location.href = 'index.php?halaman=siswa';
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
            window.location.href = 'index.php?halaman=siswa';
        })
        </script>
        ";
}
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Siswa</h3>
                <p class="text-subtitle text-muted">
                    Halaman Tambah Data Siswa
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=siswa">Siswa</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Data Siswa
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="index.php?halaman=siswa" class="btn btn-primary btn-sm mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS Siswa" required>
                        <label for="nis">NIS</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" placeholder="Nama Siswa" required>
                        <label for="nm_siswa">Nama Siswa</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" required>
                        <label for="tmp_lahir">Tempat Lahir</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        <label for="tgl_lahir">Tanggal Lahir</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="jkel" id="jkel" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <label for="jkel">Jenis Kelamin</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="height: 100px;" required></textarea>
                        <label for="alamat">Alamat</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telepon" required>
                        <label for="telp">Telepon</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_wali" name="nm_wali" placeholder="Nama Wali" required>
                        <label for="nm_wali">Nama Wali</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="kd_kelas" id="kd_kelas" required>
                            <option value="">Pilih Kelas</option>
                            <?php
                            $kelasQuery = mysqli_query($connection, "SELECT * FROM kelas");
                            while ($kelas = mysqli_fetch_assoc($kelasQuery)) {
                                echo "<option value='{$kelas['kd_kelas']}'>{$kelas['nm_kelas']}</option>";
                            }
                            ?>
                        </select>
                        <label for="kd_kelas">Kelas</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
