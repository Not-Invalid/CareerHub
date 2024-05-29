<?php
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id_karir = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM karir WHERE id_karir='$id_karir'");
    while ($data = mysqli_fetch_array($query)) {
        $id_karir = $data['id_karir'];
        $tujuan_karir = $data['tujuan_karir'];
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CareerHub | Ubah Karir</title>
        <link rel="stylesheet" href="../../.././assets/css/admin/form.css">
        <link rel="stylesheet" href="../../.././assets/css/sidebar.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="../../../controller/admin/ubah/ubah_karir.php" method="post">
        <h1> Ubah Data </h1>
        
        <fieldset>

          <label for="tujuan_karir">Tujuan Karir</label>
          <input type="text" id="tujuan_karir" name="tujuan_karir" value="<?php echo $tujuan_karir; ?>" required>          
        </fieldset>
       
        <input type="submit" value="Ubah Data" name="ubah">
        <a href="../../admin/karir.php" class="btn-batal">Batal</a>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
