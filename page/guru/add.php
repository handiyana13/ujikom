<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_POST['submit'])) {
        $nip = $_POST['nip'];
        $nm_guru = htmlspecialchars($_POST['nm_guru']);
        $tmp_lahir_guru = htmlspecialchars($_POST['tmp_lahir_guru']);
        $tgl_lahir_guru = $_POST['tgl_lahir_guru'];
        $kel_guru = $_POST['kel_guru'];
        $alamat = htmlspecialchars($_POST['alamat']);
        $telp = htmlspecialchars($_POST['telp']);
        $kd_matpel = $_POST['kd_matpel'];
    
        $query = mysqli_query($connection, "INSERT INTO guru (nip, nm_guru, tmp_lahir_guru, tgl_lahir_guru, kel_guru, alamat, telp, kd_matpel) 
        VALUES ('$nip', '$nm_guru', '$tmp_lahir_guru', '$tgl_lahir_guru', '$kel_guru', '$alamat', '$telp', '$kd_matpel')");
    


        if ($query == TRUE) {
            $message = "Berhasil menambahkan data";
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
            $message = "Gagal menambahkan data";
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
                <h3>Data Mata Pelajaran</h3>
                <p class="text-subtitle text-muted">
                    Halaman Tambah Data Mata Pelajaran
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=guru">guru</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Data guru
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
    <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP Guru" required>
    <label for="nip">NIP</label>
</div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nm_guru" name="nm_guru" placeholder="Nama Guru" required>
        <label for="nm_guru">Nama Guru</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="tmp_lahir_guru" name="tmp_lahir_guru" placeholder="Tempat Lahir" required>
        <label for="tmp_lahir_guru">Tempat Lahir</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" required>
        <label for="tgl_lahir_guru">Tanggal Lahir</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" name="kel_guru" id="kel_guru" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <label for="kel_guru">Jenis Kelamin</label>
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
        <select class="form-select" name="kd_matpel" id="kd_matpel" required>
            <option value="">Pilih Mata Pelajaran</option>
            <?php
            $matpelQuery = mysqli_query($connection, "SELECT * FROM matpel");
            while ($matpel = mysqli_fetch_assoc($matpelQuery)) {
                echo "<option value='{$matpel['kd_matpel']}'>{$matpel['nm_matpel']}</option>";
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