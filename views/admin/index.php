<?php
include '../.././config/koneksi.php';
include '../.././layout/sidebar.php';

$querySiswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa");
$queryJurusan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM jurusan");
$queryKelas = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kelas");
$querydataApproved = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa WHERE status_persetujuan = 1");

$totalSiswa = mysqli_fetch_assoc($querySiswa)['total'];
$totalJurusan = mysqli_fetch_assoc($queryJurusan)['total'];
$totalKelas = mysqli_fetch_assoc($queryKelas)['total'];
$totaldataApproved = mysqli_fetch_assoc($querydataApproved)['total'];

$queryTujuanKarir = mysqli_query($koneksi, "SELECT tujuan_karir, COUNT(*) as total FROM siswa INNER JOIN karir ON siswa.id_karir = karir.id_karir GROUP BY tujuan_karir");
$tujuanKarir = [];
while ($row = mysqli_fetch_assoc($queryTujuanKarir)) {
    $tujuanKarir[$row['tujuan_karir']] = $row['total'];
}

$labels = array_keys($tujuanKarir);
$data = array_values($tujuanKarir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CareerHub | Admin</title>
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="../.././assets/css/admin/style.css" rel="stylesheet">
    <link href="../.././assets/css/sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="../.././assets/css/sweetalert2.min.css">
    <script src="../.././assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php if (isset($_GET['status'])): ?>
    <?php 
        if ($_GET['status'] == 'suksesLogin') {
            echo '<script>
                    Swal.fire({
                        position: "center",
                        iconHtml: \'<i class="fas fa-hand-paper"></i>\',
                        customClass: {
                            icon: "no-border"
                        },
                        title: "Selamat Datang",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    </script>';
        } 
    ?>
<?php endif;?>

<div class="grid-container">
    <main class="main-container">
        <div class="main-title">
            <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

            <div class="card">
                <div class="card-inner">
                    <h3>Siswa</h3>
                    <i class="fas fa-users"></i>
                </div>
                <h1><?php echo $totalSiswa ?></h1>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>Jurusan</h3>
                    <i class="fas fa-book"></i>
                </div>
                <h1><?php echo $totalJurusan ?></h1>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>Kelas</h3>
                    <i class="fas fa-school"></i>
                </div>
                <h1><?php echo $totalKelas ?></h1>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>Data Approved</h3>
                    <i class="fas fa-check"></i>
                </div>
                <h1><?php echo $totaldataApproved ?></h1>
            </div>

        </div>

        <div class="charts">

            <div class="charts-card">
                <h2 class="chart-title">Tujuan Karir</h2>
                <canvas id="bar-chart"></canvas>
            </div>

        </div>
    </main>
</div>
<script src="../.././assets/js/sidebar.js"></script>
<script src="../../assets/js/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('bar-chart').getContext('2d');
    var colors = ['#880d1e', '#f6ae2d', '#548c2f', '#00a6fb'];
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Jumlah Siswa',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: colors,
                borderColor: colors.map(color => color.replace('0.5', '1')),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
