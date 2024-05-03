<?php

include '../../config/koneksi.php';
include '../../layout/user_sidebar.php';

session_start();

if(isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    $nisn = $_SESSION['nisn'];
    $query = mysqli_query($koneksi, "SELECT siswa.nisn, nilai_semester.*
    FROM siswa
    LEFT JOIN nilai_semester ON siswa.nisn = nilai_semester.nisn
    WHERE siswa.nisn='$nisn'");

    $data = mysqli_fetch_array($query);
    $nisn = $data['nisn'];    
    $nilai_semester_1 = $data['nilai_semester_1'];
    $nilai_semester_2 = $data['nilai_semester_2'];
    $nilai_semester_3 = $data['nilai_semester_3'];
    $nilai_semester_4 = $data['nilai_semester_4'];
    $nilai_semester_5 = $data['nilai_semester_5'];
    $nilai_semester_6 = $data['nilai_semester_6'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././assets/css/user/datadiri.css">
    <link rel="stylesheet" href="../.././assets/css/sidebar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>CareerHub</title>
</head>
<body>
    <div class="container">
        <header>Data Nilai</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Ubah Data Nilai</span>

                    <div class="fields">
                        <div class="input-field-nilai">
                            <label for="nilai_semester_1">Semester 1</label>
                            <input type="number" id="nilai_semester_1" name="nilai_semester_1" value="<?php echo $nilai_semester_1; ?>" required step="0.01">
                        </div>

                        <div class="input-field-nilai">
                            <label for="nilai_semester_2">Semester 2</label>
                            <input type="number" id="nilai_semester_2" name="nilai_semester_2" value="<?php echo $nilai_semester_2; ?>" required step="0.01">
                        </div>

                        <div class="input-field-nilai">
                            <label for="nilai_semester_3">Semester 3</label>
                            <input type="number" id="nilai_semester_3" name="nilai_semester_3" value="<?php echo $nilai_semester_3; ?>" required step="0.01">
                        </div>

                        <div class="input-field-nilai">
                            <label for="nilai_semester_4">Semester 4</label>
                            <input type="number" id="nilai_semester_4" name="nilai_semester_4" value="<?php echo $nilai_semester_4; ?>" required step="0.01">
                        </div>

                        <div class="input-field-nilai">
                            <label for="nilai_semester_5">Semester 5</label>
                            <input type="number" id="nilai_semester_5" name="nilai_semester_5" value="<?php echo $nilai_semester_5; ?>" required step="0.01">
                        </div>

                        <div class="input-field-nilai">
                            <label for="nilai_semester_6">Semester 6</label>
                            <input type="number" id="nilai_semester_6" name="nilai_semester_6" value="<?php echo $nilai_semester_6; ?>" required step="0.01">
                        </div>                
                    </div>
                </div>

                <div class="button">
                    <div class="buttons">        
                        <button type="submit" name="ubah" class="navBtn">
                            <span class="btnText">Simpan Data</span>
                            <i class="fas fa-save"></i>
                        </button>
                        <a href="data_nilai.php" class="navBtn">
                            <span class="btnText">Batal</span>
                            <i class="fas fa-xmark"></i>
                        </a>
                    </div>
                </div> 
            </div>
        </form>
        

    <script src="../.././assets/js/sidebar.js"></script>
    <script src="../.././assets/js/data.js"></script>
    
</body>
</html>
