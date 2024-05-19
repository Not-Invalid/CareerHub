<?php 
include '../../config/koneksi.php';
include '../../layout/sidebar.php';

$entriesPerPage = isset($_GET['entries']) ? $_GET['entries'] : 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $entriesPerPage;

$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'nisn';
$orderDirection = isset($_GET['orderDirection']) ? $_GET['orderDirection'] : 'desc';
if ($orderBy === 'approved') {
    $orderByClause = "siswa.status_persetujuan $orderDirection";
} else {
    $orderByClause = "$orderBy $orderDirection";
}
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'nisn';
$orderDirection = isset($_GET['orderDirection']) ? $_GET['orderDirection'] : 'desc';


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $countQuery = "SELECT COUNT(*) as total FROM siswa
                   LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
                   LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                   WHERE siswa.nisn LIKE '%$search%' OR siswa.nama_siswa LIKE '%$search%' OR jurusan.nama_jurusan LIKE '%$search%' OR kelas.nama_kelas LIKE '%$search%'";
    $sql = "SELECT siswa.*, jurusan.nama_jurusan, kelas.nama_kelas FROM siswa
            LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            WHERE siswa.nisn LIKE '%$search%' OR siswa.nama_siswa LIKE '%$search%' OR jurusan.nama_jurusan LIKE '%$search%' OR kelas.nama_kelas LIKE '%$search%'
            ORDER BY $orderByClause
            LIMIT $start, $entriesPerPage";
} else {
    $countQuery = "SELECT COUNT(*) as total FROM siswa LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan";
    $sql = "SELECT siswa.*, jurusan.nama_jurusan, kelas.nama_kelas FROM siswa
            LEFT JOIN jurusan ON siswa.kode_jurusan = jurusan.kode_jurusan
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            ORDER BY $orderByClause
            LIMIT $start, $entriesPerPage";
}


$totalRowsQuery = mysqli_query($koneksi, $countQuery);
$totalRows = mysqli_fetch_assoc($totalRowsQuery)['total'];
$totalPages = ceil($totalRows / $entriesPerPage);

$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerHub | Data Siswa</title>
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
            <div class="entries">
                Show <select name="" id="table_size" class="entries_select">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> entries
            </div>
            <div class="filter">
                <label for="search">Search:</label>
                <input type="search" name="search" id="search" placeholder="Cari disini" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
            </div>
        </div>
        <div class="tambahData">
            <a href="" id="btnCetakLaporan" class="button">Cetak Laporan</a>
        </div>
        <?php if (isset($_GET['status'])): ?>
            <?php  
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
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jurusan</th>
                <th>Kelas <a class="sortFtr" href="?orderBy=nama_kelas&orderDirection=<?php echo $orderDirection === 'desc' ? 'asc' : 'desc'; ?>"><i class="fas fa-sort"></i></a></th>
                <th>Status <a class="sortFtr" href="?orderBy=status_persetujuan&orderDirection=<?php echo $orderDirection === 'desc' ? 'asc' : 'desc'; ?>"><i class="fas fa-sort"></i></a></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="siswaInfo">
        <?php
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $data['nisn'] . "</td>";
                echo "<td>" . $data['nama_siswa'] . "</td>";
                echo "<td>" . ($data['nama_jurusan'] ?? '') . "</td>";
                echo "<td>" . $data['nama_kelas'] . "</td>";
                echo "<td>";
                echo "<select name='status_persetujuan' id='status_persetujuan_" . $data['nisn'] . "' class='" . (!$data['status_persetujuan'] ? 'not_approved_status' : 'approved_status') . "'>";
                echo "<option class='" . ($data['status_persetujuan'] ? 'approved_status' : 'not_approved_status') . "' value='0'" . (!$data['status_persetujuan'] ? ' selected' : '') . ">Not Approved</option>";
                echo "<option class='" . ($data['status_persetujuan'] ? 'approved_status' : 'not_approved_status') . "' value='1'" . ($data['status_persetujuan'] ? ' selected' : '') . ">Approved</option>";
                echo "</select>";
                echo "</td>";
                echo "<td width='160'>";
                echo "<a class='btn btn-view btn-sm ' href='tampil/tampil_data.php?id=".$data['nisn']."'> <i class='fa-solid fa-eye fs-6'></i></a> ";
                echo "<a class='btn btn-hapus btn-sm' href='#' onclick='confirmDelete(\"../.././controller/admin/hapus/hapus_siswa.php?id=".$data['nisn']."\")'><i class='fa-solid fa-trash fs-6'></i></a>";
                echo "</td>";
                echo "</tr>";

                $no++;
            }
        ?>
        </tbody>
    </table>
    <footer>
        <span class="showEntries">Menampilkan Data <?php echo mysqli_num_rows($query); ?> Dari Total <?php echo mysqli_num_rows($query); ?> Data</span>
        <div class="pagination" data-totalpages="<?php echo $totalPages; ?>" data-currentpage="<?php echo $page; ?>"></div>
    </footer>
    
    <script src="../.././assets/js/sidebar.js"></script>
    <script src="../.././assets/js/table.js"></script>
    <script>
        var selects = document.querySelectorAll('select[name="status_persetujuan"]');
        selects.forEach(function(select) {
            select.addEventListener('change', function() {
                var nisn = this.id.split('_')[2];
                var status = this.value;
                
                if (status === '1') {
                    this.classList.remove('not_approved_status');
                    this.classList.add('approved_status');
                } else {
                    this.classList.remove('approved_status');
                    this.classList.add('not_approved_status');
                }
            
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../controller/approve_dataSiswa.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.error('Terjadi kesalahan: ' + xhr.status);
                    }
                };
                xhr.send('nisn=' + nisn + '&status=' + status);
            });
        });

        document.getElementById('search').addEventListener('input', function() {
            var search = this.value.trim();
            var url = window.location.href.split('?')[0];
            if (search !== '') {
                url += '?search=' + search;
            }
            window.location.href = url;
        });

        document.getElementById('btnCetakLaporan').addEventListener('click', function() {
            window.open('../.././controller/cetak_laporan.php', '_blank');
        });


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
</div>
</body>
</html>
