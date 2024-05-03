<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "db_careerhub" ;

// $server = "localhost";
// $user = "id21999475_flii";
// $pass = "careerHub-1";
// $db = "id21999475_careerhub" ;

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
    die('koneksi database gagal : ' . mysqli_connect_error());
}
?>
