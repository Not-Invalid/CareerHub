<?php 
include "../../../config/koneksi.php";
if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = '$id_kelas'");

    if ($query) {
        header ('location:../../../views/admin/kelas.php?status=delete');
    }else{
       die ("gagal menghapus");
    }
}else{
    die ("akses dilarang");
}
?>