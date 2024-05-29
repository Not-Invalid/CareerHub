<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Tambah Karir</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/tambah/add_karir.php" method="post">
        <h1> Tambah Data </h1>
        
        <fieldset>
        
          <label for="tujuan_karir">Tujuan karir</label>
          <input type="text" id="tujuan_karir" name="tujuan_karir">
          
        </fieldset>
       
        <input type="submit" value="Tambah Data" name="tambah">
        <a href="../../admin/karir.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
      <script src="../../../assets/js/sidebar.js"></script>
    </body>
</html>
