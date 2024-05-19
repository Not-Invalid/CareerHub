<?php
session_start();

include '../../../config/koneksi.php';

if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
    if (isset($_POST['ubah'])) {
        $id_nilai_semester = $_POST['id_nilai_semester'];
        $nisn = $_POST['nisn'];
        $nilai_semester_1 = $_POST['nilai_semester_1'];
        $nilai_semester_2 = $_POST['nilai_semester_2'];
        $nilai_semester_3 = $_POST['nilai_semester_3'];
        $nilai_semester_4 = $_POST['nilai_semester_4'];
        $nilai_semester_5 = $_POST['nilai_semester_5'];
        $nilai_semester_6 = $_POST['nilai_semester_6'];

        $query = "UPDATE nilai_semester SET
                  nilai_semester_1='$nilai_semester_1',
                  nilai_semester_2='$nilai_semester_2',
                  nilai_semester_3='$nilai_semester_3',
                  nilai_semester_4='$nilai_semester_4',
                  nilai_semester_5='$nilai_semester_5',
                  nilai_semester_6='$nilai_semester_6'
                  WHERE id_nilai_semester='$id_nilai_semester'";

        if (mysqli_query($koneksi, $query)) {
            header('Location: ../../../views/user/data_nilai.php?status=ubah');
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        header('Location: ../../view/data_nilai.php?status=gagalubah');
        exit();
    }
} else {
    header("Location: ../../login.php");
    exit();
}
?>
