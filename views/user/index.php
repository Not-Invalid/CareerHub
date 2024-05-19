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
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="../.././assets/css/user/style.css" rel="stylesheet">
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
                        <h3>Hallo Hubsters 👋</h3>
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