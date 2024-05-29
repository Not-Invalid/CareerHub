<?php
include '../../../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $namaKelasArray = $_POST['nama_kelas'];

    foreach ($namaKelasArray as $namaKelas) {
        $sql = "INSERT INTO kelas (nama_kelas) VALUES ('$namaKelas')";
        if (!mysqli_query($koneksi, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
    header('location:../../../views/admin/kelas.php?status=Sukses');
    exit;
} else {
    header('location:../../../views/admin/karir.php?status=gagal');
    exit;
}
?>
