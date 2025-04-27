<?php
include "./function/connection.php";

try {
    $message = "";
    $success = FALSE;
    $error = FALSE;

    if (isset($_GET['nip'])) {
        $nip = $_GET['nip'];

        // Select Data dan Check Data
        $select = mysqli_query($connection, "SELECT nm_guru FROM guru WHERE nip = '$nip'");
        $data = mysqli_fetch_assoc($select);

        if (!$data) {
            header('Location: index.php?halaman=guru');
        }

        // Query untuk menghapus data
        $query = mysqli_query($connection, "DELETE FROM guru WHERE nip = '$nip'");

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
                window.location.href = 'index.php?halaman=guru';
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
                window.location.href = 'index.php?halaman=guru';
            })
            </script>
            ";
        }
    } else {
        $message = "NIP tidak ditemukan";
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
