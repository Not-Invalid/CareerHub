<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = mysqli_query($koneksi, "INSERT INTO jurusan (kode_jurusan, nama_jurusan) 
    VALUES ('$kode_jurusan','$nama_jurusan')");
    

if ($query) {
    header('location:../../../views/admin/jurusan.php?status=Sukses');
} else {
    header('location:../../../views/admin/jurusan.php?status=gagal');
}
} else {
    die ("Akses dilarang...");
}
?>