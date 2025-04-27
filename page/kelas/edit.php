<?php
include "./function/connection.php";

if (!isset($_SESSION['nama'])) {
    header('Location: index.php?halaman=login');
}

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['kd_kelas'])) {
        $kd_kelas = $_GET['kd_kelas'];

        // Ambil data kelas
        $select = mysqli_query($connection, "SELECT * FROM kelas WHERE kd_kelas = '$kd_kelas'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=kelas');
        }

        // Proses update jika form disubmit
        if (isset($_POST['submit'])) {
            $nm_kelas = htmlspecialchars($_POST['nm_kelas']);
            $jml_siswa = intval($_POST['jml_siswa']);
            $thn_ajaran = htmlspecialchars($_POST['thn_ajaran']);
            $nip = $_POST['nip'];

            $query = mysqli_query($connection, "UPDATE kelas SET 
                                                nm_kelas = '$nm_kelas', 
                                                jml_siswa = $jml_siswa, 
                                                thn_ajaran = '$thn_ajaran',
                                                nip = '$nip'
                                                WHERE kd_kelas = '$kd_kelas'");

            if ($query == TRUE) {
                echo "
                <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data kelas berhasil diubah.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = 'index.php?halaman=kelas';
                });
                </script>
                ";
            } else {
                echo "
                <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data kelas gagal diubah.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = 'index.php?halaman=kelas';
                });
                </script>
                ";
            }
        }
    }
} catch (\Throwable $th) {
    echo "
    <script>
    Swal.fire({
        title: 'Error',
        text: 'Terjadi kesalahan pada server.',
        icon: 'error',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        window.location.href = 'index.php?halaman=kelas';
    });
    </script>
    ";
}
?>

<!-- HTML FORM EDIT KELAS -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kelas</h3>
                <p class="text-subtitle text-muted">Halaman Ubah Data Kelas</p>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="index.php?halaman=kelas" class="btn btn-primary btn-sm mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="kd_kelas" name="kd_kelas" value="<?= $data['kd_kelas'] ?>" readonly>
                        <label for="kd_kelas">Kode Kelas</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_kelas" name="nm_kelas" value="<?= $data['nm_kelas'] ?>" required>
                        <label for="nm_kelas">Nama Kelas</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="jml_siswa" name="jml_siswa" value="<?= $data['jml_siswa'] ?>" required>
                        <label for="jml_siswa">Jumlah Siswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="thn_ajaran" name="thn_ajaran" value="<?= $data['thn_ajaran'] ?>" required>
                        <label for="thn_ajaran">Tahun Ajaran</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="nip" name="nip" required>
                            <?php
                            $guruQuery = mysqli_query($connection, "SELECT * FROM guru");
                            while ($guru = mysqli_fetch_assoc($guruQuery)) {
                                $selected = $guru['nip'] == $data['nip'] ? 'selected' : '';
                                echo "<option value='{$guru['nip']}' $selected>{$guru['nm_guru']} - {$guru['nip']}</option>";
                            }
                            ?>
                        </select>
                        <label for="nip">Wali Kelas (Guru)</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
