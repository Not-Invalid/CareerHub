<?php
include '../../.././config/koneksi.php';

if (isset($_GET['id'])) {
    $nisn = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT siswa.*, jurusan.nama_jurusan, karir.tujuan_karir, kelas.nama_kelas,
    nilai_semester.nilai_semester_1, nilai_semester.nilai_semester_2, nilai_semester.nilai_semester_3,
    nilai_semester.nilai_semester_4, nilai_semester.nilai_semester_5, nilai_semester.nilai_semester_6
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

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Data Diri</span>

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
                    <span class="title">Data Nilai</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nilai_semester_1">Semester 1</label>
                            <input type="number" id="nilai_semester_1" name="nilai_semester_1" value="<?php echo $nilai_semester_1; ?>" readonly step="0.01">
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_2">Semester 2</label>
                            <input type="number" id="nilai_semester_2" name="nilai_semester_2" value="<?php echo $nilai_semester_2; ?>" readonly step="0.01">
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_3">Semester 3</label>
                            <input type="number" id="nilai_semester_3" name="nilai_semester_3" value="<?php echo $nilai_semester_3; ?>" readonly step="0.01">
                        </div>


                        <div class="input-field">
                            <label for="nilai_semester_4">Semester 4</label>
                            <input type="number" id="nilai_semester_4" name="nilai_semester_4" value="<?php echo $nilai_semester_4; ?>" readonly step="0.01">
                        </div>

                        <div class="input-field">
                            <label for="nilai_semester_5">Semester 5</label>
                            <input type="number" id="nilai_semester_5" name="nilai_semester_5" value="<?php echo $nilai_semester_5; ?>" readonly step="0.01">
                        </div>

                        <div class="input-field">
                            <label for="nilai_semester_6">Semester 6</label>
                            <input type="number" id="nilai_semester_6" name="nilai_semester_6" value="<?php echo $nilai_semester_6; ?>" readonly step="0.01">
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details_nilai">

                    <div class="charts">
                        <div class="charts-card">
                            <h2 class="chart-title">Proyeksi Nilai</h2>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                    </div>

                </div>
 
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../.././assets/js/data.js"></script>
    <script>
        var nilaiSemester = [
        <?php echo $nilai_semester_1; ?>,
        <?php echo $nilai_semester_2; ?>,
        <?php echo $nilai_semester_3; ?>,
        <?php echo $nilai_semester_4; ?>,
        <?php echo $nilai_semester_5; ?>,
        <?php echo $nilai_semester_6; ?>
    ];

    var labels = ["Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6"];

    var ctx = document.getElementById('line-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nilai Semester',
                data: nilaiSemester,
                borderColor: '#538d22',
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
</html>