<?php
include '../.././config/koneksi.php';
include '../.././layout/user_sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CareerHub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="../.././assets/css/user/style.css" rel="stylesheet">
    <link href="../.././assets/css/sidebar.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <main class="main-container">

        <div class="main-cards">
            <div class="card">
                <div class="card-inner">
                    <div class="welcome-message">
                        <h3>Welcome!</h3>
                        <p>Thank you for visiting our dashboard.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="info">
            <div class="info-card">
                <div class="info-card-inner">
                    <div class="info-text">
                        <h3>Hallo Raf 👋</h3>
                        <p>Sudah cek data kamu?</p>
                        <a href="data_diri.php" class="info-button">Cek Sekarang</a>
                    </div>
                    <img src="../.././assets/img/info-img.png">
                </div>
            </div>
        </div>
    </main>
</div>
<script src="../.././assets/js/sidebar.js"></script>
<script src="../../assets/js/admin.js"></script>

</body>
</html>