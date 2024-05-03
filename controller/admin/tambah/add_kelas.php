<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO kelas(id_kelas, nama_kelas) 
    VALUES ('$id_kelas', '$nama_kelas')");
    

if ($query) {
    header('location:../../../views/admin/kelas.php?status=Sukses');
} else {
    header('location:../../../views/admin/kelas.php?status=gagal');
}
} else {
    die ("Akses dilarang...");
}
?>