<?php
include '../../../config/koneksi.php';
include '../../../layout/sidebar.php';

if (isset($_GET['id'])) {
    $kode_jurusan = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$kode_jurusan'");
    while ($data = mysqli_fetch_array($query)) {
        $kode_jurusan = $data['kode_jurusan'];
        $nama_jurusan = $data['nama_jurusan'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Ubah Jurusan</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/ubah/ubah_jurusan.php" method="post">
        <h1> Ubah Data </h1>
        
        <fieldset>
        
          <label for="kode_jurusan">Kode Jurusan</label>
          <input type="text" id="kode_jurusan" name="kode_jurusan" value="<?php echo $kode_jurusan; ?>" readonly>

          <label for="nama_jurusan">Nama Jurusan</label>
          <input type="text" id="nama_jurusan" name="nama_jurusan" value="<?php echo $nama_jurusan; ?>" required>

          
        </fieldset>
       
        <input type="submit" value="Ubah Data" name="ubah">
        <a href="../../admin/jurusan.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
