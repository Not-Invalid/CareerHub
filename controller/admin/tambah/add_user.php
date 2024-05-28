<?php
include '../../../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $nisns = $_POST['nisn'];
    $roles = $_POST['id_role'];

    function generateRandomPassword($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }

    for ($i = 0; $i < count($nisns); $i++) {
        $nisn = $nisns[$i];
        $role = $roles[$i];
        $password = generateRandomPassword(); 

        $query = "INSERT INTO users (nisn, password, id_role) VALUES ('$nisn', '$password', '$role')";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {

            echo "Error: " . mysqli_error($koneksi);
            exit;
        }

        echo "User with NISN: $nisn added successfully. Generated password: $password <br>";
    }

    header('Location: ../../../views/admin/user.php?status=Sukses');
    exit;
}
?>