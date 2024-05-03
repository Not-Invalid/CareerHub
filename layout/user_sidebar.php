<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>CareerHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/sidebar.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle">
      <i class='fas fa-bars' id="header-toggle"></i>
    </div>
    <div class="header_img">
      <img src="../../assets/img/smk_logo.png" alt="">
    </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="../../views/admin/index.php" class="nav_logo">
          <img src="../../assets/img/Asset1.png" class="nav_logo-img">
          <span class="nav_logo-name">CareerHub</span>
        </a>
        <div class="nav_list">
          <a href="../../views/user/index.php" class="nav_link">
            <i class='fas fa-th nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a href="../../views/user/data_diri.php" class="nav_link">
            <i class='fas fa-users nav_icon'></i>
            <span class="nav_name">Data Diri</span>
          </a>
          <a href="../../views/user/data_nilai.php" class="nav_link">
            <i class='fas fa-book nav_icon'></i>
            <span class="nav_name">Data Nilai</span>
          </a>
        </div>
      </div>
      <a href="../../controller/logout.php" class="nav_link">
        <i class='fas fa-sign-out-alt nav_icon'></i>
        <span class="nav_name">Logout</span>
      </a>
    </nav>
  </div>

  <script src="../../assets/js/sidebar.js"></script>
</body>

</html>
