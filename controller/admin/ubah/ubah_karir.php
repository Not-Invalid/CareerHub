<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $id_karir = htmlspecialchars($_POST['id_karir']);
    $tujuan_karir = htmlspecialchars($_POST['tujuan_karir']);

    $query = mysqli_query($koneksi, "UPDATE karir SET tujuan_karir='$tujuan_karir' WHERE id_karir = '$id_karir'");
    if($query) {
        header('location:../../../views/admin/karir.php?status=ubah');
    } else {
        die("Gagal Mengubah data: " . mysqli_error($koneksi));
    }

}
?>