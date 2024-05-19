<?php 
include "../../../config/koneksi.php";
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user = '$id_user'");

    if ($query) {
        header ('location:../../../views/admin/user.php?status=terhapus');
    }else{
        header ('location:../../../views/admin/user.php?status=gagalhapus');
    }
}else{
    die ("akses dilarang");
}
?>