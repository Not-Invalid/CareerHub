<?php 
include "../../../config/koneksi.php";
if (isset($_GET['id'])) {
    $kode_jurusan = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM jurusan WHERE kode_jurusan = '$kode_jurusan'");

    if ($query) {
        header ('location:../../../views/admin/jurusan.php?status=terhapus');
    }else{
        header ('location:../../../views/admin/jurusan.php?status=gagalhapus');
    }
}else{
    die ("akses dilarang");
}
?>