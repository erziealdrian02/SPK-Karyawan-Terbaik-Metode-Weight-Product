<?php
include('koneksi.php');
require '../vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();

// Encode images to base64
$logo1_path = '../images/logo1.png'; // Ubah path ini sesuai lokasi gambar

if (file_exists($logo1_path)) {
    $logo1 = base64_encode(file_get_contents($logo1_path));
} else {
    die('Gambar tidak ditemukan. Pastikan path gambar benar.');
}

$days = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];

// Array untuk nama bulan dalam bahasa Indonesia
$months = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

// Mendapatkan tanggal saat ini
$date = new DateTime();

// Mendapatkan hari, bulan, dan tahun dalam bahasa Inggris
$day = $days[$date->format('l')]; // Mengambil nama hari dan konversi ke bahasa Indonesia
$dayNumber = $date->format('d'); // Mengambil nomor hari
$month = $months[$date->format('F')]; // Mengambil nama bulan dan konversi ke bahasa Indonesia
$year = $date->format('Y'); // Mengambil tahun

// Menggabungkan semua menjadi satu string
$formattedDate = "Jakarta, $day $dayNumber $month $year";

// Generate HTML content
$html = '
<center>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    .header {
        width: 100%;
        margin-bottom: 20px;
        border-bottom: 1px solid black;
        padding-bottom: 10px;
        text-align: center;
    }

    .header img {
        width: 100px;
    }

    .info {
        text-align: center;
    }

    .info h1 {
        font-size: 20px;
    }

    .info h2 {
        font-size: 19px;
    }

    .info p {
        margin: 5px 0;
        font-size: 13px;
    }

    .table-container {
        margin-top: 20px;
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 10px; /* Mengubah ukuran font pada tabel */
    }

    .table-header {
        border: none;
    }

    .table-header td {
        border: none;
    }

    th, td {
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

    .signature {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        margin-top: 40px;
        margin-left: 200px;
    }

    .signature div {
        left:20px;
    }

    .table-data tr, th, td {
        border: 1px solid black;
    }
</style>
</head>
<body>
    <div class="header">
        <table class="table-header">
            <tr>
                <td><img src="data:image/png;base64,' . $logo1 . '" alt="Logo 1"></td>
                <td class="info">
                    <h1>PT. Swarga Loka Dinamika</h1>
                    <p>Jl. Tali Raya G-II, No. 29, Slipi, 12041, RT.8/RW.2, Slipi,<br> Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11410</p>
                </td>
                <td><img src="data:image/png;base64,' . $logo1 . '" style="visibility: hidden" alt="Logo 1"></td>
            </tr>
        </table>
    </div>

    <div class="table-container">
        <table class="table" style="margin-right=30px">
            <thead>
                <tr class="bg-light">
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Nama Karyawan</th>
                    <th class="border-top-0">Jabatan</th>
                    <th class="border-top-0">Kerja Sama</th>
                </tr>
            </thead>
            <tbody>
';

$no = 1;
$sql = mysqli_query($connect, "SELECT * FROM perhitungan_absen ORDER BY ks DESC");
if (!$sql) {
    die('Query Error: ' . mysqli_error($connect));
}

$vector_sums = [];

// Loop pertama untuk menghitung Vector S dan menyimpannya
while ($data_absen = mysqli_fetch_array($sql)) {
    $select = mysqli_query($connect, "SELECT * FROM kriteria");
    if (!$select) {
        die('Query Error: ' . mysqli_error($connect));
    }

    while ($data_bobot = mysqli_fetch_array($select)) {
        $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
        $bobot_1 = $data_bobot['kj'] / $total_bobot;
        $bobot_2 = $data_bobot['kl'] / $total_bobot;
        $bobot_3 = $data_bobot['kt'] / $total_bobot;
        $bobot_4 = $data_bobot['in'] / $total_bobot;
        $bobot_5 = $data_bobot['ly'] / $total_bobot;
        $bobot_6 = $data_bobot['ks'] / $total_bobot;
        $bobot_7 = $data_bobot['kte'] / $total_bobot;
        $bobot_8 = $data_bobot['mm'] / $total_bobot;
        $bobot_9 = $data_bobot['tj'] / $total_bobot;
        $bobot_10 = $data_bobot['kjin'] / $total_bobot;

        $vector = pow($data_absen['kj'], $bobot_1) *
            pow($data_absen['kl'], $bobot_2) *
            pow($data_absen['kt'], $bobot_3) *
            pow($data_absen['in'], $bobot_4) *
            pow($data_absen['ly'], $bobot_5) *
            pow($data_absen['ks'], $bobot_6) *
            pow($data_absen['kte'], $bobot_7) *
            pow($data_absen['mm'], $bobot_8) *
            pow($data_absen['tj'], $bobot_9) *
            pow($data_absen['kjin'], $bobot_10);

        $vector_sums[] = $vector;
    }
}

$total_vector_s = array_sum($vector_sums);

mysqli_data_seek($sql, 0);

while ($data_absen = mysqli_fetch_array($sql)) {
    $select = mysqli_query($connect, "SELECT * FROM kriteria");
    if (!$select) {
        die('Query Error: ' . mysqli_error($connect));
    }

    while ($data_bobot = mysqli_fetch_array($select)) {
        $total_bobot = $data_bobot['kj'] + $data_bobot['kl'] + $data_bobot['kt'] + $data_bobot['in'] + $data_bobot['ly'] + $data_bobot['ks'] + $data_bobot['kte'] + $data_bobot['mm'] + $data_bobot['tj'] + $data_bobot['kjin'];
        $bobot_1 = $data_bobot['kj'] / $total_bobot;
        $bobot_2 = $data_bobot['kl'] / $total_bobot;
        $bobot_3 = $data_bobot['kt'] / $total_bobot;
        $bobot_4 = $data_bobot['in'] / $total_bobot;
        $bobot_5 = $data_bobot['ly'] / $total_bobot;
        $bobot_6 = $data_bobot['ks'] / $total_bobot;
        $bobot_7 = $data_bobot['kte'] / $total_bobot;
        $bobot_8 = $data_bobot['mm'] / $total_bobot;
        $bobot_9 = $data_bobot['tj'] / $total_bobot;
        $bobot_10 = $data_bobot['kjin'] / $total_bobot;

        $vector = pow($data_absen['kj'], $bobot_1) *
            pow($data_absen['kl'], $bobot_2) *
            pow($data_absen['kt'], $bobot_3) *
            pow($data_absen['in'], $bobot_4) *
            pow($data_absen['ly'], $bobot_5) *
            pow($data_absen['ks'], $bobot_6) *
            pow($data_absen['kte'], $bobot_7) *
            pow($data_absen['mm'], $bobot_8) *
            pow($data_absen['tj'], $bobot_9) *
            pow($data_absen['kjin'], $bobot_10);

        $vector_v = $vector / $total_vector_s;

        $html .= '
            <tr class="table-data">
                <td>' . $no++ . '</td>
                <td>' . $data_absen['nama_pera'] . '</td>
                <td>' . $data_absen['jabatan_pera'] . '</td>
                <td>' . $data_absen['ks'] . '</td>
            </tr>
        ';
    }
}

$html .= '
        </tbody>
    </table>
</div>
<div class="signature">
        <p>' . $formattedDate . '</p>
        <p style="margin-top: 80px;">_________________________</p>
        <p style="margin-top: 10px;">Bino Hermansyah <br> (HRD Manager)</p>
</div>

</body>
</html>
</center>
';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Laporan_Penilaian.pdf", array("Attachment" => false));
exit(0);
