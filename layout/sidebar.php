<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>CareerHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
  <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
  <script src="../assets/js/sweetalert2.all.min.js"></script>
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
          <img src="../../assets/img/ch_logo.png" class="nav_logo-img">
          <span class="nav_logo-name">CareerHub</span>
        </a>
        <div class="nav_list">
          <a href="../../views/admin/index.php" class="nav_link">
            <i class='fas fa-th nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a href="../../views/admin/siswa.php" class="nav_link">
            <i class='fas fa-users nav_icon'></i>
            <span class="nav_name">Siswa</span>
          </a>
          <a href="../../views/admin/jurusan.php" class="nav_link">
            <i class='fas fa-book nav_icon'></i>
            <span class="nav_name">Jurusan</span>
          </a>
          <a href="../../views/admin/kelas.php" class="nav_link">
            <i class='fas fa-school nav_icon'></i>
            <span class="nav_name">Kelas</span>
          </a>
          <a href="../../views/admin/karir.php" class="nav_link">
            <i class='fas fa-business-time nav_icon'></i>
            <span class="nav_name">Tujuan Karir</span>
          </a>
          <a href="../../views/admin/user.php" class="nav_link">
            <i class='fas fa-user nav_icon'></i>
            <span class="nav_name">Data User</span>
          </a>
        </div>
      </div>
      <a href="#" onclick="logout()" class="nav_link">
        <i class='fas fa-sign-out-alt nav_icon'></i>
        <span class="nav_name">Logout</span>
      </a>
    </nav>
  </div>

  <script>
    function logout() {
      Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../../controller/logout.php';
        }
      });
    }
  </script>
</body>

</html>
