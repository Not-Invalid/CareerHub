<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>CareerHub | Login </title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
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
                <input type="password" placeholder="Masukkan Password" name="password" required>
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
</body>
</html>