<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $nisn = $_POST['nisn'];
    $id_user = $_POST['id_user'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $kode_jurusan = $_POST['kode_jurusan'];
    $id_kelas = $_POST['id_kelas'];
    $id_karir = $_POST['id_karir'];
    $status_persetujuan = 0;

    $query = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama_siswa', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp', kode_jurusan='$kode_jurusan', id_kelas = '$id_kelas', id_karir = '$id_karir', status_persetujuan = '$status_persetujuan' 
    WHERE nisn = '$nisn'");

    if ($query) {
        header('location:../../../views/user/data_diri.php?status=ubah');
    } else {
        die("Gagal Mengubah data");
    }
} else {
    die("Akses Dilarang");
}
