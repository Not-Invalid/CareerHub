<?php
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
    while ($data = mysqli_fetch_array($query)) {
        $id_kelas = $data['id_kelas'];
        $nama_kelas = $data['nama_kelas'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Ubah Kelas</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/ubah/ubah_kelas.php" method="post">
        <h1> Ubah Data </h1>
        
        <fieldset>

          <label for="nama_kelas">Nama Kelas</label>
          <input type="text" id="nama_kelas" name="nama_kelas" value="<?php echo $nama_kelas; ?>" required>          
        </fieldset>
       
        <input type="submit" value="Ubah Data" name="ubah">
        <a href="../../admin/kelas.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
