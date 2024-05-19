<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $id_user = htmlspecialchars($_POST['id_user']);
    $id_role = htmlspecialchars($_POST['id_role']);

    $query = mysqli_query($koneksi, "UPDATE users SET id_role='$id_role' WHERE id_user = '$id_user'");
    if($query) {
        header('location:../../../views/admin/user.php?status=ubah');
    } else {
        die("Gagal Mengubah data: " . mysqli_error($koneksi));
    }

}
?>