<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CareerHub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet">
    <script src="assets/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php include 'layout/navbar.php'?>

    <?php if (isset($_GET['status'])): ?>
        <?php 
            if ($_GET['status'] == 'logout') {
                echo '<script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Logout Berhasil",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>';
            } 
        ?>
    <?php endif;?>
    <div class="container-fluid pt-5 bg-primary header-header mb-5" id="home">
        <div class="container pt-5" >
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5" >
                    <h1 class="display-8 text-white mb-4 animated slideInRight">Platform Karier untuk memantau prestasi akademis dan pendataan diri Siswa.</h1>
                    <p class="text-white mb-4 animated slideInRight">Aplikasi ini dirancang untuk memfasilitasi Anda dalam memantau nilai serta mempermudah perjalanan pendidikan Anda menuju jenjang yang lebih tinggi.</p>
                    <a href="#about" class="btn btn-light py-sm-2 px-sm-3 rounded-pill me-1 animated slideInRight">Read More</a>
                    <a href="partials/register.php" class="btn btn-outline-light py-sm-2 px-sm-3 rounded-pill animated slideInRight">Get Started</a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="assets/img/header-img.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="assets/img/ch_logo_secondary.png">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" >
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">Apa itu CareerHub?</h1>
                    <p class="mb-4">
                        Kami menyediakan platform yang memungkinkan pemantauan nilai Anda melalui sebuah aplikasi khusus.
                        Aplikasi CareerHub adalah sebuah platform karier yang bertujuan untuk membantu siswa dalam memantau prestasi akademis dan pendataan diri mereka.
                        Aplikasi ini dirancang khusus untuk memudahkan pengguna dalam memantau nilai-nilai mereka serta membantu mereka dalam perjalanan pendidikan menuju jenjang yang lebih tinggi.
                        Dengan menggunakan aplikasi ini, pengguna dapat dengan mudah memantau nilai-nilai akademis mereka melalui platform yang disediakan.
                        Selain itu, CareerHub juga menyadari pentingnya pendidikan dalam meraih cita-cita, sehingga mereka menyediakan berbagai fitur yang membantu pengguna dalam mencapai tujuan dan impian mereka. 
                        Dengan demikian, CareerHub menjadi sarana yang dapat membantu pengguna dalam meraih kesuksesan dan menggapai impian mereka.
                    </p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary tutorial pt-5" id="tutorial">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Tutorial</div>
                    <h1 class="text-white mb-4">Panduan Penggunaan CareerHub</h1>
                    <div class="d-flex align-items-center text-white mb-2">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fas fa-dots"></i>
                        </div>
                        <span>Silakan masuk ke aplikasi CareerHub menggunakan akun Anda.</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-2">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fas fa-dots"></i>
                        </div>
                        <span>Periksa dengan teliti data diri yang tercantum di profil Anda.</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-2">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fas fa-dots"></i>
                        </div>
                        <span>Isilah data diri Anda dengan lengkap dan akurat apabila belum terisi</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-2">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fas fa-dots"></i>
                        </div>
                        <span>Pastikan juga untuk mengisi data nilai akademis Anda secara lengkap.</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-2">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fas fa-dots"></i>
                        </div>
                        <span>Setelah melengkapi semua informasi, tunggu persetujuan admin sebelum melanjutkan.</span>
                    </div>
                </div>
                <div class="col-lg-6 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <img class="tutorial-img" src="assets/img/tutorial.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php';?>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2" style="padding: .5rem .5rem;"> <i class="bi bi-arrow-up"></i></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>