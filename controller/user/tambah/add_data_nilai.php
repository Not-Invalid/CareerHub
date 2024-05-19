<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
  $id_nilai_semester = $_POST['id_nilai_semester'];
  $nisn = $_POST['nisn'];
  $nilai_semester_1 = $_POST['nilai_semester_1'];
  $nilai_semester_2 = $_POST['nilai_semester_2'];
  $nilai_semester_3 = $_POST['nilai_semester_3'];
  $nilai_semester_4 = $_POST['nilai_semester_4'];
  $nilai_semester_5 = $_POST['nilai_semester_5'];
  $nilai_semester_6 = $_POST['nilai_semester_6'];




  $query = mysqli_query($koneksi, "INSERT INTO nilai_semester (id_nilai_semester, nisn, nilai_semester_1, nilai_semester_2, nilai_semester_3, nilai_semester_4, nilai_semester_5, nilai_semester_6) 
    VALUES ('$id_nilai_semester','$nisn','$nilai_semester_1','$nilai_semester_2', '$nilai_semester_3', '$nilai_semester_4', '$nilai_semester_5','$nilai_semester_6')");


  if ($query) {
    header('location:../../../views/user/data_nilai.php?status=Sukses');
  } else {
    header('location:../../../views/user/data_nilai.php?status=gagal');
  }
} else {
  die("Akses dilarang...");
}
