<?php
include "../../../config/koneksi.php";

if (isset($_POST['ubah'])) {
    $nisn = htmlspecialchars($_POST['nisn']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
    $kode_jurusan = htmlspecialchars($_POST['kode_jurusan']);
    $kelas = htmlspecialchars($_POST['nama_kelas']);
    $tujuan_karir = htmlspecialchars($_POST['tujuan_karir']);
    $nilai_semester_1 = htmlspecialchars($_POST['nilai_semester_1']);
    $nilai_semester_2 = htmlspecialchars($_POST['nilai_semester_2']);
    $nilai_semester_3 = htmlspecialchars($_POST['nilai_semester_3']);
    $nilai_semester_4 = htmlspecialchars($_POST['nilai_semester_4']);
    $nilai_semester_5 = htmlspecialchars($_POST['nilai_semester_5']);
    $nilai_semester_6 = htmlspecialchars($_POST['nilai_semester_6']);

    $query = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp', kode_jurusan='$kode_jurusan', id_kelas='$kelas', id_karir='$tujuan_karir' WHERE nisn = '$nisn'"); 

    $query_nilai = mysqli_query($koneksi, "UPDATE nilai_semester SET nilai_semester_1='$nilai_semester_1', nilai_semester_2='$nilai_semester_2', nilai_semester_3='$nilai_semester_3', nilai_semester_4='$nilai_semester_4', nilai_semester_5='$nilai_semester_5', nilai_semester_6='$nilai_semester_6' WHERE nisn = '$nisn'"); 

    if($query && $query_nilai) {
        header('location:../../../views/admin/siswa.php?status=ubah');
    } else {
        die("Gagal Mengubah data: " . mysqli_error($koneksi));
    }
}
?>
