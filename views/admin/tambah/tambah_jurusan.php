<?php 
    include '../../../layout/sidebar.php'
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Tambah Jurusan</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/tambah/add_jurusan.php" method="post">
        <h1> Tambah Data </h1>
        
        <fieldset>
        
          <label for="kode_jurusan">Kode Jurusan</label>
          <input type="text" id="kode_jurusan" name="kode_jurusan">

          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" id="nama_jurusan" name="nama_jurusan">

          
        </fieldset>
       
        <input type="submit" value="Tambah Data" name="tambah">
        <a href="../../admin/jurusan.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
      <script src="../../../assets/js/sidebar.js"></script>
    </body>
</html>
