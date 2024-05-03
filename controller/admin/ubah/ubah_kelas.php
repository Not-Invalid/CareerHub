<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $id_kelas = htmlspecialchars($_POST['id_kelas']);
    $nama_kelas = htmlspecialchars($_POST['nama_kelas']);

    $query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas = '$id_kelas'");
    if($query) {
        header('location:../../../views/admin/kelas.php?status=ubah');
    } else {
        die("Gagal Mengubah data: " . mysqli_error($koneksi));
    }

}
?>