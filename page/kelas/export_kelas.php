<?php
require_once './assets/extensions/dompdf/autoload.inc.php'; // pastikan path ini benar
use Dompdf\Dompdf;

include "./function/connection.php";

// Ambil data kelas
$query = mysqli_query($connection, "
    SELECT kelas.*, guru.nm_guru 
    FROM kelas 
    JOIN guru ON kelas.nip = guru.nip
");

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Kelas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3 style="text-align:center;">Data Kelas</h3>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Tahun Ajaran</th>
                <th>NIP</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        <tbody>';
        $i = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            $html .= '
            <tr>
                <td>'.$i++.'</td>
                <td>'.$data['kd_kelas'].'</td>
                <td>'.$data['nm_kelas'].'</td>
                <td>'.$data['jml_siswa'].'</td>
                <td>'.$data['thn_ajaran'].'</td>
                <td>'.$data['nip'].'</td>
                <td>'.$data['nm_guru'].'</td>
            </tr>';
        }
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Inisialisasi Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');

// Render PDF
$dompdf->render();

// Bersihkan buffer
ob_end_clean();

// Outputkan file PDF ke browser
$dompdf->stream("data_kelas.pdf", array("Attachment" => false));

exit(); // Cukup exit biasa setelah stream
?>
