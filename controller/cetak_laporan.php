<?php
session_start();
require('fpdf/fpdf.php');

class Pdf extends FPDF
{
    function letak($gambar, $teks1, $teks2, $teks3, $teks4)
    {
        $this->AddPage('P', 'A4');
        $this->Image($gambar, 35, 6, 25, 25);
        $this->judul($teks1, $teks2, $teks3, $teks4);
        $this->garis();
        $this->SetY(50);
    }

    function judul($teks1, $teks2, $teks3, $teks4)
    {
        $this->Cell(25);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 5, $teks2, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'I', 10);
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
    }

    function garis()
    {
        $lebar_halaman = 210;
        $setengah_halaman = $lebar_halaman / 2;
        $garis_posisi = $setengah_halaman - 85;

        $this->SetLineWidth(1);
        $this->Line($garis_posisi, 36, $garis_posisi + 170, 36);
        $this->SetLineWidth(0);
        $this->Line($garis_posisi, 37, $garis_posisi + 170, 37);
    }

    function generatePDF($content)
    {
        $this->SetFont('Arial', '', 12);

        $this->SetFont('Arial', 'BI', 12);
        $this->SetX(35);
        $this->Cell(50, 18, 'Kelas', 1, 0, 'C');
        $this->Cell(90, 12, 'Minat Karir', 1, 1, 'C');

        $this->SetFont('Arial', 'BI', 10);
        $this->SetX(35);
        $this->Cell(50, 6, '', 0, 0);
        $this->Cell(30, 6, 'Bekerja', 1, 0, 'C');
        $this->Cell(30, 6, 'Kuliah', 1, 0, 'C');
        $this->Cell(30, 6, 'Wirausaha', 1, 1, 'C');

        $this->SetFont('Arial', '', 12);
        foreach ($content as $row) {
            $this->SetX(35);
            $this->Cell(50, 10, $row['nama_kelas'], 1, 0, 'C');
            $this->Cell(30, 10, $row['jumlah_bekerja'], 1, 0, 'C');
            $this->Cell(30, 10, $row['jumlah_kuliah'], 1, 0, 'C');
            $this->Cell(30, 10, $row['jumlah_wirausaha'], 1, 1, 'C');
        }
    }
}

$pdf = new Pdf();

include '../config/koneksi.php';

$query = "SELECT kelas.nama_kelas,
                 SUM(CASE WHEN karir.tujuan_karir = 'Bekerja' THEN 1 ELSE 0 END) AS jumlah_bekerja,
                 SUM(CASE WHEN karir.tujuan_karir = 'Kuliah' THEN 1 ELSE 0 END) AS jumlah_kuliah,
                 SUM(CASE WHEN karir.tujuan_karir = 'Wirausaha' THEN 1 ELSE 0 END) AS jumlah_wirausaha
          FROM siswa
          LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
          LEFT JOIN karir ON siswa.id_karir = karir.id_karir
          GROUP BY kelas.nama_kelas
          ORDER BY kelas.nama_kelas ASC";

$result = mysqli_query($koneksi, $query);

$content = array();
while ($row = mysqli_fetch_assoc($result)) {
    $content[] = $row;
}

mysqli_close($koneksi);

$pdf->letak('../assets/img/LOGO-PROVINSI-BANTEN.png', 'DAFTAR MINAT KARIR SISWA', 'SMK NEGERI 4 TANGERANG', 'Jl. Veteran No. 1A Telepon : (021) 5523429', 'Email : smkn4kotatng@yahoo.co.id ');
$pdf->generatePDF($content);
$pdf->Output();
?>
