<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['kd_matpel'])) {
        $kd_matpel = $_GET['kd_matpel'];

        // Select Data dan Check Data
        $select = mysqli_query($connection, "SELECT nm_matpel FROM matpel WHERE kd_matpel = '$kd_matpel'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=matpel');
        }

        $query = mysqli_query($connection, "DELETE FROM matpel WHERE kd_matpel = '$kd_matpel'");

        if ($query == TRUE) {
            $message = "Berhasil menghapus data";
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
            $message = "Tidak Bisa Menghapus Data Karena Terhubung dengan Data Lain";
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
    } else {
        $message = "kd_matpel tkd_matpelak ditemukan";
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
