<?php
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM users WHERE id_user='$id_user'");
    while ($data = mysqli_fetch_array($query)) {
        $id_user = $data['id_user'];
        $nisn = $data['nisn'];
        $password = $data['password'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Ubah User</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/ubah/ubah_user.php" method="post">
        <h1> Ubah Data </h1>
        
        <fieldset>
        
          <label for="nisn">NISN</label>
          <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>" readonly>

          <label for="password">Password</label>
          <div class="password-input">
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" readonly>
                    <i id="password-toggle-icon" class="fas fa-eye-slash toggle-password" onclick="togglePassword()"></i>
                </div>
          <label for="nama_role">Roles</label>
                <select name="id_role" id="id_role">
                    <?php
                        include '../../../config/koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM role");
                        while($data = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?=$data['id_role'];?>"><?php echo $data['nama_role'];?></option>
                        <?php
                        }
                    ?>
                </select>
        </fieldset>
       
        <input type="submit" value="Ubah Data" name="ubah">
        <a href="../../admin/user.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
          <script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.getElementById("password-toggle-icon");
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
