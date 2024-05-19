<?php

include '../../config/koneksi.php';
include '../../layout/user_sidebar.php';

session_start();

if(isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    $nisn = $_SESSION['nisn'];
    $query = mysqli_query($koneksi, "SELECT siswa.*, jurusan.nama_jurusan, karir.tujuan_karir, kelas.nama_kelas
    FROM siswa
    LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
    LEFT JOIN karir ON siswa.id_karir = karir.id_karir
    LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    WHERE siswa.nisn='$nisn'");
    
    $data_exists = mysqli_num_rows($query) > 0;
    if ($data_exists) {
        $data = mysqli_fetch_array($query);
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        $nama_jurusan = $data['nama_jurusan'];
        $nama_kelas = $data['nama_kelas'];
        $tujuan_karir = $data['tujuan_karir'];
        $status_persetujuan = $data['status_persetujuan'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././assets/css/user/datadiri.css">
    <link rel="stylesheet" href="../.././assets/css/sidebar.css">
    <link rel="stylesheet" href="../.././assets/css/sweetalert2.min.css">
    <script src="../.././assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>CareerHub</title>
</head>
<body>
    <div class="container">
        <header>Data Diri
            <?php if ($data_exists): ?>
            <span class="status-container <?php echo $status_persetujuan == 1 ? 'status-approved' : 'status-not-approved'; ?>">
                <span class="status-indicator"></span>
                <span class="status-text">
                    <?php echo $status_persetujuan == 1 ? 'Approved' : 'Not Approved'; ?>
                </span>
            </span>
            <?php endif; ?>
        </header>

        <?php if ($data_exists): ?>
        <form>
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" id="nama_jurusan" name="nama_jurusan" value="<?php echo $nama_jurusan; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="kelas">Kelas</label>
                            <input type="text" id="kelas" name="kelas" value="<?php echo $nama_kelas; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="tujuan_karir">Tujuan Karir</label>
                            <input type="text" id="tujuan_karir" name="tujuan_karir" value="<?php echo $tujuan_karir; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="button">

                    <div class="buttons">        
                        <a href="ubah_data_diri.php" class="navBtn">
                            <span class="btnText">Ubah Data</span>
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <a href="data_nilai.php" class="navBtn">
                            <span class="btnText">Data Nilai</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div> 

            </div>
        </form>
        
        <?php else: ?>
            <div class="no-data-message">
                <p>Kamu belum mengisi data. Isi data sekarang! </p>
                <button onclick="location.href='tambah_data_diri.php'" class="inputBtn">Tambah Data</button>
            </div>
        <?php endif; ?>

    <script src="../.././assets/js/sidebar.js"></script>
    <?php if (isset($_GET['status'])): ?>
            <?php 
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'Sukses') {
                        echo '<script>
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Data berhasil ditambahkan",
                                    text: "Menunggu Persetujuan",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                              </script>';
                    } 
                    if ($_GET['status'] == 'ubah') {
                        echo '<script>
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Data berhasil diubah",
                                    text: "Menunggu Persetujuan",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                              </script>';
                    } 
                }
            ?>
    <?php endif;?>
    
</body>
</html>