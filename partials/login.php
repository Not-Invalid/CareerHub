<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub | Login </title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
      .input-box {
        position: relative;
      }
      
      .input-box input[type="password"] {
        padding-right: 30px; 
      }
      
      .input-box .toggle-password {
        position: absolute;
        top: 50%;
        right: 5px;
        transform: translateY(-50%);
        cursor: pointer;
      }
    </style>
  </head>
  <body>
  <?php if (isset($_GET['status'])): ?>
    <?php
    if ($_GET['status'] == 'gagalLogin') {
        echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Login Gagal",
                    text: "NISN atau password yang Anda masukkan salah.",
                    showConfirmButton: false,
                    timer: 2500
                });
                </script>';
    }
    ?>
<?php endif;?>
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="../assets/img/SMKN-4-Tangerang.png" alt="">
          <div class="text">
            <span class="text-1">CareerHub</span>
            <span class="text-2">We are happy to have you back.</span>
          </div>
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form action="../controller/cek-login.php" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-id-card"></i>
                  <input type="text" placeholder="Masukkan NISN" name="nisn" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Masukkan Password" name="password" id="password" required>
                  <i class="fas fa-eye-slash toggle-password" onclick="togglePassword()"></i>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Login">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      function togglePassword() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.querySelector(".toggle-password");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          passwordIcon.classList.remove("fa-eye-slash");
          passwordIcon.classList.add("fa-eye");
        } else {
          passwordInput.type = "password";
          passwordIcon.classList.remove("fa-eye");
          passwordIcon.classList.add("fa-eye-slash");
        }
      }
    </script>
  </body>
</html>
