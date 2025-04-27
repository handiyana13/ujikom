<?php
include "./function/connection.php";

if (!isset($_SESSION['nama'])) {
    header('Location: index.php?halaman=login');
}

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['nip'])) {
        $nip = $_GET['nip'];

        // Select Data
        $select = mysqli_query($connection, "SELECT * FROM guru WHERE nip = '$nip'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=guru');
        }

        // Submit
        if (isset($_POST['submit'])) {
            $nm_guru = htmlspecialchars($_POST['nm_guru']);
            $tmp_lahir_guru = htmlspecialchars($_POST['tmp_lahir_guru']);
            $tgl_lahir_guru = $_POST['tgl_lahir_guru'];
            $kel_guru = $_POST['kel_guru'];
            $alamat = htmlspecialchars($_POST['alamat']);
            $telp = htmlspecialchars($_POST['telp']);
            $kd_matpel = $_POST['kd_matpel'];

            $query = mysqli_query($connection, "UPDATE guru SET 
                                                nm_guru = '$nm_guru', 
                                                tmp_lahir_guru = '$tmp_lahir_guru', 
                                                tgl_lahir_guru = '$tgl_lahir_guru',
                                                kel_guru = '$kel_guru',
                                                alamat = '$alamat',
                                                telp = '$telp',
                                                kd_matpel = '$kd_matpel'
                                                WHERE nip = '$nip'");

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
                    window.location.href = 'index.php?halaman=guru';
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
                    window.location.href = 'index.php?halaman=guru';
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
        window.location.href = 'index.php?halaman=guru';
    })
    </script>
    ";
}
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Guru</h3>
                <p class="text-subtitle text-muted">
                    Halaman Ubah Data Guru
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=guru">Guru</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ubah Data Guru
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="index.php?halaman=guru" class="btn btn-primary btn-sm mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="nip" placeholder="NIP Guru" name="nip" value="<?= $data['nip'] ?>" required readonly>
                        <label for="nip">NIP</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_guru" placeholder="Nama Guru" name="nm_guru" value="<?= $data['nm_guru'] ?>" required>
                        <label for="nm_guru">Nama Guru</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="tmp_lahir_guru" placeholder="Tempat Lahir" name="tmp_lahir_guru" value="<?= $data['tmp_lahir_guru'] ?>" required>
                        <label for="tmp_lahir_guru">Tempat Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" value="<?= $data['tgl_lahir_guru'] ?>" required>
                        <label for="tgl_lahir_guru">Tanggal Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="kel_guru" name="kel_guru" required>
                            <option value="L" <?= $data['kel_guru'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $data['kel_guru'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <label for="kel_guru">Jenis Kelamin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" required><?= $data['alamat'] ?></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telp" placeholder="Telepon" name="telp" value="<?= $data['telp'] ?>" required>
                        <label for="telp">Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="kd_matpel" name="kd_matpel" required>
                            <!-- Dropdown untuk memilih mata pelajaran (sesuaikan dengan data di tabel matpel) -->
                            <?php
                            $matpelQuery = mysqli_query($connection, "SELECT * FROM matpel");
                            while ($matpel = mysqli_fetch_assoc($matpelQuery)) {
                                echo "<option value='{$matpel['kd_matpel']}'" . ($matpel['kd_matpel'] == $data['kd_matpel'] ? ' selected' : '') . ">{$matpel['nm_matpel']}</option>";
                            }
                            ?>
                        </select>
                        <label for="kd_matpel">Mata Pelajaran</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
