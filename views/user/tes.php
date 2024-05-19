<?php
include '../.././config/koneksi.php';
session_start(); 

if(isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    $nisn = $_SESSION['nisn'];
    $query = mysqli_query($koneksi, "SELECT siswa.*, jurusan.nama_jurusan, karir.tujuan_karir, kelas.nama_kelas
    FROM siswa
    LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
    LEFT JOIN karir ON siswa.id_karir = karir.id_karir
    LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    WHERE siswa.nisn='$nisn'");
    
    $data_exists = mysqli_num_rows($query) > 0;
    if ($data_exists) {
        $data = mysqli_fetch_array($query);
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        $nama_jurusan = $data['nama_jurusan'];
        $nama_kelas = $data['nama_kelas'];
        $tujuan_karir = $data['tujuan_karir'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../.././assets/css/user/ubahdd.css">
    <link rel="stylesheet" href="../.././assets/vendor/css/bootstrap.min.css">    

</head>

<body>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform">
                <ul id="progressbar">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
                <fieldset>
                    <h2 class="fs-title">Data Diri</h2>
                    <h3 class="fs-subtitle">Isi Data Diri Dengan Baik dan Benar</h3>
                    <label>NISN</label>
                    <input type="text" name="nisn" value="<?php echo $nisn; ?>" />
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="<?php echo $nama_siswa; ?>"  />
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"  />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Data Diri</h2>
                    <h3 class="fs-subtitle">Isi Data Diri Dengan Baik dan Benar</h3>
                    <label>Jenis Kelamin</label>
                    <select>
                        <option value="Laki Laki"> Laki Laki</option>
                        <option value="Perempuan"> Perempuan</option>
                    </select>
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $alamat; ?>"  />
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" value="<?php echo $no_telp; ?>"  />
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Data Diri</h2>
                    <h3 class="fs-subtitle">Isi Data Diri Dengan Baik dan Benar</h3>
                    <label>Jurusan</label>
                    <select name="kode_jurusan" id="kode_jurusan">
                        <?php
                            include '../../../config/koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                            while($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?=$data['kode_jurusan'];?>"><?php echo $data['nama_jurusan'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <label>Kelas</label>
                    <select name="id_kelas" id="id_kelas">
                        <?php
                            include '../../../config/koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                            while($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?=$data['id_kelas'];?>"><?php echo $data['nama_kelas'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <label>Tujuan Karir</label>
                    <select name="id_karir" id="id_karir">
                        <?php
                            include '../../../config/koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM karir");
                            while($data = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?=$data['id_karir'];?>"><?php echo $data['tujuan_karir'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />
                </fieldset>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script>
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;

    $(".next").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        next_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'absolute'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = ((1 - now) * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'left': left
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function() {
        return false;
    })
    </script>
</body>
</html>