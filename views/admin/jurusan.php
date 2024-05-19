<?php 
include '../../config/koneksi.php';
include '../../layout/sidebar.php';

$entriesPerPage = isset($_GET['entries']) ? $_GET['entries'] : 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $entriesPerPage;

$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'kode_jurusan';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM jurusan WHERE kode_jurusan LIKE '%$search%' OR nama_jurusan LIKE '%$search%' ORDER BY $orderBy LIMIT $start, $entriesPerPage";
} else {
    $sql = "SELECT * FROM jurusan ORDER BY $orderBy LIMIT $start, $entriesPerPage";
}
$query = mysqli_query($koneksi, $sql);

$totalRowsQuery = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM jurusan");
$totalRows = mysqli_fetch_assoc($totalRowsQuery)['total'];
$totalPages = ceil($totalRows / $entriesPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub | Data Jurusan</title>
    <link rel="stylesheet" type="text/css" href="../.././assets/css/admin/table.css">
    <link rel="stylesheet" type="text/css" href="../.././assets/css/sidebar.css">
    <link rel="stylesheet" href="../.././assets/css/sweetalert2.min.css">
    <script src="../.././assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <header>
        <div class="filterEntries">
            <div class="entries"> Show
                <select name="entries" id="table_size" onchange="changeEntries()">
                    <option value="10" <?php if($entriesPerPage == 10) echo "selected"; ?>>10</option>
                    <option value="20" <?php if($entriesPerPage == 20) echo "selected"; ?>>20</option>
                    <option value="50" <?php if($entriesPerPage == 50) echo "selected"; ?>>50</option>
                    <option value="100" <?php if($entriesPerPage == 100) echo "selected"; ?>>100</option>
                </select> entries
            </div>
            <div class="filter">
                <label for="search">Search:</label>
                <input type="search" name="search" id="search" placeholder="Cari disini" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
            </div>
        </div>
        <div class="tambahData">
            <a href="tambah/tambah_jurusan.php" class="button">Tambah Data</a>
        </div>
        <?php if (isset($_GET['status'])): ?>
            <?php 
                if ($_GET['status'] == 'Sukses') {
                    echo '<script>
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Data berhasil ditambahkan",
                                showConfirmButton: false,
                                timer: 1500
                            });
                          </script>';
                } 
                if ($_GET['status'] == 'ubah') {
                    echo '<script>
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Data berhasil diubah",
                                showConfirmButton: false,
                                timer: 1500
                            });
                          </script>';
                } 
                if ($_GET['status'] == 'terhapus') {
                    echo '<script>
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Data berhasil dihapus",
                                showConfirmButton: false,
                                timer: 1500
                            });
                          </script>';
                }
                if ($_GET['status'] == 'gagalhapus') {
                    echo '<script>
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Data gagal dihapus",
                                showConfirmButton: false,
                                timer: 1500
                            });
                          </script>';
                }
            ?>
        <?php endif;?>
    </header>
    <table>
        <thead>
            <tr class="heading">
                <th>No</th>
                <th onclick="sortColumn('kode_jurusan')">Kode Jurusan <i id="icon_kode_jurusan" class="fa fa-sort"></i></th>
                <th onclick="sortColumn('nama_jurusan')">Nama Jurusan <i id="icon_nama_jurusan" class="fa fa-sort"></i></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="userInfo">
        <?php
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $data['kode_jurusan'] . "</td>";
                echo "<td>" . $data['nama_jurusan'] . "</td>";
                echo "<td width = '160'>";
                echo "<a class='btn btn-ubah btn-sm ' href='ubah/ubah_jurusan.php?id=".$data['kode_jurusan']."'> <i class='fa-solid fa-pen-to-square fs-6'></i></a> ";
                echo "<a class='btn btn-hapus btn-sm' href='#' onclick='confirmDelete(\"../.././controller/admin/hapus/hapus_jurusan.php?id=".$data['kode_jurusan']."\")'><i class='fa-solid fa-trash fs-6'></i></a>";
                echo "</td>";
                echo "</tr>";

                $no++;
            }
        ?>
        </tbody>
    </table>
    <footer>
    <span class="showEntries">Menampilkan Data <?php echo mysqli_num_rows($query); ?> Dari Total <?php echo $totalRows; ?> Data</span>
    <div class="pagination" data-totalpages="<?php echo $totalPages; ?>" data-currentpage="<?php echo $page; ?>"></div>
    </footer>
</div>

<script src="../.././assets/js/table.js"></script>
<script src="../.././assets/js/sidebar.js"></script>
<script>
    document.getElementById('search').addEventListener('input', function() {
        var search = this.value.trim();
        var url = window.location.href.split('?')[0];
        if (search !== '') {
            url += '?search=' + search;
        }
        window.location.href = url;
    });

    function changeEntries() {
        var selectedValue = document.getElementById('table_size').value;
        var url = window.location.href.split('?')[0];
        window.location.href = url + '?entries=' + selectedValue;
    }

    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak akan bisa mengembalikan data ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    }
</script>
</body>
</html>