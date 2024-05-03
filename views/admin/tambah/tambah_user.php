<?php 
    include '../../../layout/sidebar.php'
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Tambah User</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/tambah/add_user.php" method="post">
        <h1> Tambah Data </h1>
        
        <fieldset>
        
          <label for="nisn">Nisn</label>
          <input type="text" id="nisn" name="nisn">

          <label for="password">Password</label>
          <input type="password" id="password" name="password">

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
       
        <input type="submit" value="Tambah Data" name="tambah">
        <a href="../../admin/user.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
      <script src="../../../assets/js/sidebar.js"></script>
    </body>
</html>
