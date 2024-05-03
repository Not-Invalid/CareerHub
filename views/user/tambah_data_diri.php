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
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././assets/css/user/tambahdata.css">
    <link rel="stylesheet" href="../.././assets/css/sidebar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>CareerHub</title>
</head>
<body>
    <div class="container">
        <header>Data Diri</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Tambah Data Diri</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>" readonly>
                        </div>

                        <div class="input-field">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" id="nama_siswa" name="nama_siswa" required>
                        </div>

                        <div class="input-field">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" name="jenis_kelamin" required>
                        </div>

                        <div class="input-field">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" required>
                        </div>

                        <div class="input-field">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" id="no_telp" name="no_telp" required>
                        </div>

                        <div class="input-field">
                            <label for="jurusan">Jurusan</label>
                            <select name="kode_jurusan" id="kode_jurusan">
                                <?php
                                    include '../../../config/koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                    while($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?=$data['kode_jurusan'];?>"><?php echo $data['nama_jurusan'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="kelas">Kelas</label>
                            <select name="id_kelas" id="id_kelas">
                                <?php
                                    include '../../../config/koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                                    while($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?=$data['id_kelas'];?>"><?php echo $data['nama_kelas'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="tujuan_karir">Tujuan Karir</label>
                            <select name="id_karir" id="id_karir">
                                <?php
                                    include '../../../config/koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT * FROM karir");
                                    while($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?=$data['id_karir'];?>"><?php echo $data['tujuan_karir'];?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <<div class="button">

                    <div class="buttons">        
                        <button type="submit" name="#" class="navBtn">
                            <span class="btnText">Tambah Data</span>
                            <i class="fas fa-save"></i>
                        </button>


                        <a href="data_diri.php" class="navBtn">
                            <span class="btnText">Batal</span>
                            <i class="fas fa-xmark"></i>
                        </a>
                    </div>
                </div>  

            </div>
        </form>

    <script src="../.././assets/js/data.js"></script>
    
</body>
</html>