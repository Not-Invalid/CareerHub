<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $kode_jurusan = htmlspecialchars($_POST['kode_jurusan']);
    $nama_jurusan = htmlspecialchars($_POST['nama_jurusan']);

    $query = mysqli_query($koneksi, "UPDATE jurusan SET kode_jurusan='$kode_jurusan', nama_jurusan='$nama_jurusan'
    WHERE kode_jurusan = '$kode_jurusan'");

    if($query) {
        header('location:../../../views/admin/jurusan.php?status=ubah');
    } else {
        die("Gagal Mengubah data");
    }
    } else {
    die("Akses Dilarang");
    }

?>
