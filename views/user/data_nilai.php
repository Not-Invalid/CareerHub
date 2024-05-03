<?php
include '../.././config/koneksi.php';
include '../.././layout/user_sidebar.php';

session_start();

if(isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    $nisn = $_SESSION['nisn'];

    $query_data_diri = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $data_diri_exists = mysqli_num_rows($query_data_diri) > 0;

    if ($data_diri_exists) {
        $query_nilai_semester = mysqli_query($koneksi, "SELECT * FROM nilai_semester WHERE nisn='$nisn'");
        $nilai_semester_exists = mysqli_num_rows($query_nilai_semester) > 0;

        if ($nilai_semester_exists) {
            $nilai_semester_data = mysqli_fetch_assoc($query_nilai_semester);
            $nilai_semester_1 = $nilai_semester_data['nilai_semester_1'];
            $nilai_semester_2 = $nilai_semester_data['nilai_semester_2'];
            $nilai_semester_3 = $nilai_semester_data['nilai_semester_3'];
            $nilai_semester_4 = $nilai_semester_data['nilai_semester_4'];
            $nilai_semester_5 = $nilai_semester_data['nilai_semester_5'];
            $nilai_semester_6 = $nilai_semester_data['nilai_semester_6'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././assets/css/user/dataNilai.css">
    <link rel="stylesheet" href="../.././assets/css/sidebar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>CareerHub</title>
</head>
<body>
    <div class="container">
        <header>Data Nilai</header>

        <?php if ($data_diri_exists): ?>
            <?php if (!$nilai_semester_exists): ?>
                <div class="no-data-message">
                    <p>Kamu belum mengisi data nilai. Isi data sekarang!</p>
                    <button onclick="location.href='tambah/tambah_data_nilai.php'" class="navBtn">Tambah Data</button>
                </div>
            <?php else: ?>
                <form action="#" class="form_nilai">
                    <div class="form first">
                        <div class="details nilai">
                            <div class="fields">
                                <div class="input-field-nilai">
                                    <label for="nilai_semester_1">Semester 1</label>
                                    <input type="number" id="nilai_semester_1" name="nilai_semester_1" value="<?php echo $nilai_semester_1; ?>" readonly step="0.01">
                                </div>

                                <div class="input-field-nilai">
                                    <label for="nilai_semester_2">Semester 2</label>
                                    <input type="number" id="nilai_semester_2" name="nilai_semester_2" value="<?php echo $nilai_semester_2; ?>" readonly step="0.01">
                                </div>

                                <div class="input-field-nilai">
                                    <label for="nilai_semester_3">Semester 3</label>
                                    <input type="number" id="nilai_semester_3" name="nilai_semester_3" value="<?php echo $nilai_semester_3; ?>" readonly step="0.01">
                                </div>

                                <div class="input-field-nilai">
                                    <label for="nilai_semester_4">Semester 4</label>
                                    <input type="number" id="nilai_semester_4" name="nilai_semester_4" value="<?php echo $nilai_semester_4; ?>" readonly step="0.01">
                                </div>

                                <div class="input-field-nilai">
                                    <label for="nilai_semester_5">Semester 5</label>
                                    <input type="number" id="nilai_semester_5" name="nilai_semester_5" value="<?php echo $nilai_semester_5; ?>" readonly step="0.01">
                                </div>

                                <div class="input-field-nilai">
                                    <label for="nilai_semester_6">Semester 6</label>
                                    <input type="number" id="nilai_semester_6" name="nilai_semester_6" value="<?php echo $nilai_semester_6; ?>" readonly step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="button">
                            <div class="buttons">        
                                <a href="ubah_data_nilai.php" class="navBtn">
                                    <span class="btnText">Ubah Data</span>
                                    <i class="fas fa-pen-to-square"></i>
                                </a>

                                <button class="nextBtn">
                                    <span class="btnText">Grafik Nilai</span>
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div> 
                    </div>

                    <div class="form second">
                        <div class="details_nilai">

                            <div class="charts">
                                <div class="charts-card">
                                    <h2 class="chart-title">Grafik Nilai</h2>
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>

                            <div class="buttons">
                                <div class="backBtn">
                                    <i class="fas fa-chevron-left"></i>
                                    <span class="btnText">Back</span>
                            </div>
                            
                        </div>

                    </div>
    
                </div>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <div class="no-data-message">
                <p>Kamu belum mengisi data diri. Isi data sekarang!</p>
                <button onclick="location.href='tambah_data_diri.php'" class="navBtn">Tambah Data</button>
            </div>
        <?php endif; ?>

    <script src="../.././assets/js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../.././assets/js/data.js"></script>
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
