<?php 
include "../../../config/koneksi.php";
if (isset($_GET['id'])) {
    $id_karir = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM karir WHERE id_karir = '$id_karir'");

    if ($query) {
        header ('location:../../../views/admin/karir.php?status=terhapus');
    }else{
        header ('location:../../../views/admin/karir.php?status=gagalhapus');
    }
}else{
    die ("akses dilarang");
}
?>