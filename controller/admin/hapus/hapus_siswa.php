<?php 
include "../../../config/koneksi.php";
if (isset($_GET['id'])) {
    $nisn = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn = '$nisn'");

    if ($query) {
        header ('location:../../../views/admin/siswa.php?status=terhapus');
    }else{
        header ('location:../../../views/admin/siswa.php?status=gagalhapus');
    }
}else{
    die ("akses dilarang");
}
?>