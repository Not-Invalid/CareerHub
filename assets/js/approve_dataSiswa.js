function updateApprovalStatus(nisn) {
    var statusSelect = document.getElementById('status_persetujuan_' + nisn);
    var status = statusSelect.value;

    if (status === '1') {
        statusSelect.classList.remove('not_approved_status');
        statusSelect.classList.add('approved_status');
    } else {
        statusSelect.classList.remove('approved_status');
        statusSelect.classList.add('not_approved_status');
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../../controller/approve_dataSiswa.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error('Terjadi kesalahan: ' + xhr.status);
        }
    };
    xhr.send('nisn=' + nisn + '&status=' + status);
}
