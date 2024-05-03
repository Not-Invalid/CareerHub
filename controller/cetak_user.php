<?php
require('../config/koneksi.php');
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../assets/img/LOGO-PROVINSI-BANTEN.png',18,6,22);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 5, 'DAFTAR NISN DAN PASSWORD SISWA UNTUK CAREERHUB', 0, 1, 'C');
        $this->Cell(0, 5, 'SMK NEGERI 4 TANGERANG', 0, 1, 'C');
        $this->Cell(0, 5, 'Jl. Veteran No. 1A Telepon : (021) 5523429', 0, 1, 'C');
        $this->SetFont('Times', 'I', 10);
        $this->Cell(0, 5, 'Email : smkn4kotatng@yahoo.co.id ', 0, 1, 'C');
        $this->Ln(20);

        $this->SetFont('Arial','',12);
        $this->Cell(10);
        $this->Cell(40,10,'Kelas',1,0,'C');
        $this->Cell(70,10,'Nama',1,0,'C');
        $this->Cell(25,10,'NISN',1,0,'C');
        $this->Cell(40,10,'Password',1,1,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$sql = "SELECT kelas.nama_kelas, siswa.nama_siswa AS nama, users.nisn, users.password 
        FROM users
        LEFT JOIN siswa ON users.nisn = siswa.nisn
        LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        WHERE users.id_role = 2";
$result = mysqli_query($koneksi, $sql);


while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(10);
    $pdf->Cell(40,10,$row['nama_kelas'],1,0,'C');
    $pdf->Cell(70,10,$row['nama'],1,0,'L');
    $pdf->Cell(25,10,$row['nisn'],1,0,'C');
    $pdf->Cell(40,10,$row['password'],1,1,'C');
}

$pdf->Output();
?>
