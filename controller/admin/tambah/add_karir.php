<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
    $id_karir = $_POST['id_karir'];
    $tujuan_karir = $_POST['tujuan_karir'];

    $query = mysqli_query($koneksi, "INSERT INTO karir (id_karir, tujuan_karir) 
    VALUES ('$id_karir','$tujuan_karir')");
    

if ($query) {
    header('location:../../../views/admin/karir.php?status=Sukses');
} else {
    header('location:../../../views/admin/karir.php?status=gagal');
}
} else {
    die ("Akses dilarang...");
}
?>