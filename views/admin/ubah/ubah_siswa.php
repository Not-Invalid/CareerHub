<?php
include '../../.././config/koneksi.php';

if (isset($_GET['id'])) {
    $nisn = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT siswa.*, jurusan.nama_jurusan, kelas.nama_kelas,
    karir.tujuan_karir, nilai_semester.nilai_semester_1, nilai_semester.nilai_semester_2,
    nilai_semester.nilai_semester_3, nilai_semester.nilai_semester_4, nilai_semester.nilai_semester_5,
    nilai_semester.nilai_semester_6
    FROM siswa
    LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
    LEFT JOIN karir ON siswa.id_karir = karir.id_karir
    LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    LEFT JOIN nilai_semester ON siswa.nisn = nilai_semester.nisn
    WHERE siswa.nisn='$nisn'");


    while ($data = mysqli_fetch_array($query)) {
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        $nama_jurusan = $data['nama_jurusan'];
        $nama_kelas = $data['nama_kelas'];
        $tujuan_karir = $data['tujuan_karir'];
        $nilai_semester_1 = $data['nilai_semester_1'];
        $nilai_semester_2 = $data['nilai_semester_2'];
        $nilai_semester_3 = $data['nilai_semester_3'];
        $nilai_semester_4 = $data['nilai_semester_4'];
        $nilai_semester_5 = $data['nilai_semester_5'];
        $nilai_semester_6 = $data['nilai_semester_6'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../.././assets/css/admin/viewData.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>CareerHub</title>
</head>
<body>
    <div class="container">
        <header>Data Siswa
            <a href="../siswa.php" class="close-icon">
                <i class="fa-solid fa-circle-xmark"></i>
            </a>
        </header>

        <form action="../../../controller/admin/ubah/ubah_siswa.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Data Diri</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $nama_siswa; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="kode_jurusan">Jurusan</label>
                            <select name="kode_jurusan" id="kode_jurusan">
                                <?php
                                include '../../../config/koneksi.php';
                                $query_jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                                while ($data_jurusan = mysqli_fetch_assoc($query_jurusan)) {
                                    $selected = ($data_jurusan['kode_jurusan'] == $nama_jurusan) ? "selected" : "";
                                    echo "<option value='" . $data_jurusan['kode_jurusan'] . "' $selected>" . $data_jurusan['nama_jurusan'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="nama_kelas">Kelas</label>
                            <select id="nama_kelas" name="nama_kelas">
                                <?php
                                $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                                while ($data_kelas = mysqli_fetch_assoc($query_kelas)) {
                                    $selected = ($data_kelas['nama_kelas'] == $nama_kelas) ? "selected" : "";
                                    echo "<option value='" . $data_kelas['id_kelas'] . "' $selected>" . $data_kelas['nama_kelas'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="id_karir">Tujuan Karir</label>
                            <select id="id_karir" name="id_karir">
                                <?php
                                $query_karir = mysqli_query($koneksi, "SELECT * FROM karir");
                                while ($data_karir = mysqli_fetch_assoc($query_karir)) {
                                    $selected = ($data_karir['id_karir'] == $tujuan_karir) ? "selected" : "";
                                    echo "<option value='" . $data_karir['id_karir'] . "' $selected>" . $data_karir['tujuan_karir'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>



                    </div>
                </div>

                <div class="button">
                    <span class="title">Data Nilai</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nilai_semester_1">Semester 1</label>
                            <input type="number" id="nilai_semester_1" name="nilai_semester_1" value="<?php echo $nilai_semester_1; ?>" >
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_2">Semester 2</label>
                            <input type="number" id="nilai_semester_2" name="nilai_semester_2" value="<?php echo $nilai_semester_2; ?>" >
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_3">Semester 3</label>
                            <input type="number" id="nilai_semester_3" name="nilai_semester_3" value="<?php echo $nilai_semester_3; ?>" >
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_4">Semester 4</label>
                            <input type="number" id="nilai_semester_4" name="nilai_semester_4" value="<?php echo $nilai_semester_4; ?>" >
                        </div>

                        <div class="input-field">
                            <label for="nilai_semester_5">Semester 5</label>
                            <input type="number" id="nilai_semester_5" name="nilai_semester_5" value="<?php echo $nilai_semester_5; ?>" >
                        </div>

                        <div class="input-field">
                            <label for="nilai_semester_6">Semester 6</label>
                            <input type="number" id="nilai_semester_6" name="nilai_semester_6" value="<?php echo $nilai_semester_6; ?>" >
                        </div>

                        <input type="submit" value="Ubah Data" class="sendBtn" name="ubah">
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="../../.././assets/js/data.js"></script>
</body>
</html>