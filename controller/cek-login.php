<?php 
session_start();

include '../config/koneksi.php';

$nisn = htmlspecialchars($_POST["nisn"]);
$password = htmlspecialchars($_POST["password"]);

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE nisn = '$nisn' AND password = '$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);
    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['nisn'] = $user['nisn'];
    $_SESSION['status'] = "login";
    $_SESSION['login_success'] = true;

    if ($user['id_role'] == 1) {
        header("location: ../views/admin/index.php");
    } else {
        header("location: ../views/user/index.php");
    }
    exit();
} else {
    header("location:../index.php?pesan=gagal");
    exit();
}
?>
