<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['kd_kelas'])) {
        $kd_kelas = $_GET['kd_kelas'];

        // Select Data dan Check Data
        $select = mysqli_query($connection, "SELECT nm_kelas FROM kelas WHERE kd_kelas = '$kd_kelas'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=kelas');
            exit;
        }

        // Query untuk menghapus data
        $query = mysqli_query($connection, "DELETE FROM kelas WHERE kd_kelas = '$kd_kelas'");

        if ($query === TRUE) {
            $message = "Berhasil Menghapus Data Kelas";
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
                window.location.href = 'index.php?halaman=kelas';
            })
            </script>
            ";
        }
    } else {
        $message = "Kode Kelas tidak ditemukan";
        echo "
        <script>
        Swal.fire({
            title: 'Gagal',
            text: '$message',
            icon: 'warning',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        }).then(() => {
            window.location.href = 'index.php?halaman=kelas';
        })
        </script>
        ";
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
