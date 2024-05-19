<?php
include "../../../config/koneksi.php";
if (isset($_POST['tambah'])) {
  $nisn = $_POST['nisn'];
  $nama_siswa = $_POST['nama_siswa'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $kode_jurusan = $_POST['kode_jurusan'];
  $id_kelas = $_POST['id_kelas'];
  $id_karir = $_POST['id_karir'];
  $status_persetujuan = 0;

  $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn, nama_siswa, tanggal_lahir, jenis_kelamin, alamat, no_telp, kode_jurusan, id_kelas, id_karir, status_persetujuan) 
    VALUES ('$nisn','$nama_siswa','$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_telp','$kode_jurusan', '$id_kelas', '$id_karir', '$status_persetujuan' )");


  if ($query) {
    header('location:../../../views/user/data_diri.php?status=Sukses');
  } else {
    header('location:../../../views/user/data_diri.php?status=gagal');
  }
} else {
  die("Akses dilarang...");
}
