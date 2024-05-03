<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
    $id_user = $_POST['id_user'];
    $nisn = $_POST['nisn'];
    $password = $_POST['password'];
    $id__role = $_POST['id_role'];

    $query = mysqli_query($koneksi, "INSERT INTO users (id_user, nisn, password, id_role) 
    VALUES ('$id_user','$nisn','$password','$id_role')");
    

if ($query) {
    header('location:../../../views/admin/user.php?status=Sukses');
} else {
    header('location:../../../views/admin/user.php?status=gagal');
}
} else {
    die ("Akses dilarang...");
}
?>