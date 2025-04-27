<?php
include "./function/connection.php";

if (!isset($_SESSION['nama'])) {
    header('Location: index.php?halaman=login');
}

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];

        // Select Data
        $select = mysqli_query($connection, "SELECT * FROM siswa WHERE nis = '$nis'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=siswa');
        }

        // Submit
        if (isset($_POST['submit'])) {
            $nm_siswa = htmlspecialchars($_POST['nm_siswa']);
            $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
            $tgl_lahir = $_POST['tgl_lahir'];
            $jkel = $_POST['jkel'];
            $alamat = htmlspecialchars($_POST['alamat']);
            $telp = htmlspecialchars($_POST['telp']);
            $nm_wali = htmlspecialchars($_POST['nm_wali']);
            $kd_kelas = $_POST['kd_kelas'];
            $username = htmlspecialchars($_POST['username']);
            $passwordInput = $_POST['password'];

            // Hanya update password jika tidak kosong
            if (!empty($passwordInput)) {
                $password = password_hash($passwordInput, PASSWORD_DEFAULT);
                $updatePasswordQuery = ", password = '$password'";
            } else {
                $updatePasswordQuery = "";
            }

            $query = mysqli_query($connection, "UPDATE siswa SET 
                                                nm_siswa = '$nm_siswa',
                                                tmp_lahir = '$tmp_lahir',
                                                tgl_lahir = '$tgl_lahir',
                                                jkel = '$jkel',
                                                alamat = '$alamat',
                                                telp = '$telp',
                                                nm_wali = '$nm_wali',
                                                kd_kelas = '$kd_kelas',
                                                username = '$username'
                                                $updatePasswordQuery
                                                WHERE nis = '$nis'");

            if ($query == TRUE) {
                $message = "Berhasil mengubah data";
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
                $message = "Gagal mengubah data";
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
                    Halaman Ubah Data Siswa
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?halaman=siswa">Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data Siswa</li>
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
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $data['nis'] ?>" readonly>
                        <label for="nis">NIS</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" value="<?= $data['nm_siswa'] ?>" required>
                        <label for="nm_siswa">Nama Siswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?>" required>
                        <label for="tmp_lahir">Tempat Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
                        <label for="tgl_lahir">Tanggal Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="jkel" name="jkel" required>
                            <option value="L" <?= $data['jkel'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $data['jkel'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <label for="jkel">Jenis Kelamin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="alamat" name="alamat" required><?= $data['alamat'] ?></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp'] ?>" required>
                        <label for="telp">Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_wali" name="nm_wali" value="<?= $data['nm_wali'] ?>" required>
                        <label for="nm_wali">Nama Wali</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="kd_kelas" name="kd_kelas" required>
                            <?php
                            $kelasQuery = mysqli_query($connection, "SELECT * FROM kelas");
                            while ($kelas = mysqli_fetch_assoc($kelasQuery)) {
                                echo "<option value='{$kelas['kd_kelas']}'" . ($kelas['kd_kelas'] == $data['kd_kelas'] ? ' selected' : '') . ">{$kelas['kd_kelas']}</option>";
                            }
                            ?>
                        </select>
                        <label for="kd_kelas">Kelas</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="password">Password (kosongkan jika tidak ingin diubah)</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
