<?php
include "./function/connection.php";

if (!isset($_SESSION['nama'])) {
    header('Location: index.php?halaman=login');
}

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['kd_matpel'])) {
        $kd_matpel = $_GET['kd_matpel'];

        // Select Data
        $select = mysqli_query($connection, "SELECT * FROM matpel WHERE kd_matpel = '$kd_matpel'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=matpel');
            exit;
        }

        // Submit
        if (isset($_POST['submit'])) {
            $nm_matpel = htmlspecialchars($_POST['nm_matpel']);

            $query = mysqli_query($connection, "UPDATE matpel SET nm_matpel = '$nm_matpel' WHERE kd_matpel = '$kd_matpel'");

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
                    window.location.href = 'index.php?halaman=matpel';
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
                    window.location.href = 'index.php?halaman=matpel';
                })
                </script>
                ";
            }
        }
    } else {
        header('Location: index.php?halaman=matpel');
        exit;
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
            window.location.href = 'index.php?halaman=matpel';
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
                    Halaman Ubah Data Mata Pelajaran
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?halaman=matpel">Mata Pelajaran</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ubah Data Mata Pelajaran
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="index.php?halaman=matpel" class="btn btn-primary btn-sm mb-3">Kembali</a>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nm_matpel" placeholder="Nama Mata Pelajaran" name="nm_matpel" value="<?= htmlspecialchars($data['nm_matpel']) ?>" required>
                        <label for="nm_matpel">Nama Mata Pelajaran</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
