<?php
include '../config/koneksi.php';

$nisn = $_POST['nisn'];
$status = $_POST['status'];

$updateQuery = "UPDATE siswa SET status_persetujuan = '$status' WHERE nisn = '$nisn'";
if (mysqli_query($koneksi, $updateQuery)) {
    echo 'Status berhasil diperbarui';
} else {
    echo 'Gagal memperbarui status: ' . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
