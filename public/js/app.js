function handleStatusChange(id, isDone) {
    if (!isDone) {
        // Jika tombol "Belum", munculkan konfirmasi sebelum mengubah status
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menandai agenda ini sebagai selesai.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tandai selesai!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ubah status menjadi "Selesai" setelah konfirmasi
                updateStatus(id, false);
                Swal.fire('Selesai!', 'Agenda telah ditandai sebagai selesai.', 'success');
            }
        });
    } else {
        // Jika tombol "Selesai", minta konfirmasi sebelum menghapus agenda
        confirmDelete(id);
    }
}


function updateStatus(id, isDone) {
    const button = document.getElementById('status-button-' + id);
    if (!isDone) {
        // Ubah tombol menjadi "Selesai" dan tambahkan fungsi penghapusan
        button.classList.remove('btn-secondary');
        button.classList.add('btn-success');
        button.innerText = 'Selesai';
        button.onclick = function() {
            confirmDelete(id);
        };

        // Kirim permintaan ke server untuk mengubah status
        fetch(`/agenda/updateStatus/${id}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ is_done: true })
        }).catch(error => console.log(error));
    }
}


function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Setelah dikonfirmasi, agenda ini akan dihapus dari tabel.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Hapus baris tabel setelah konfirmasi
            document.getElementById(`agenda-${id}`).remove();
            Swal.fire('Dihapus!', 'Agenda telah dihapus dari tabel.', 'success');

            // Kirim permintaan ke server untuk menghapus agenda
            fetch(`/agenda/destroy/${id}`, {
                method: 'delete',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).catch(error => console.log(error));
              window.location.reload();
        }
    });
}

function handleViewDetails(agenda) {
Swal.fire({
    title: 'Detail Kegiatan',
    html: `
        <p><strong>Nama Kegiatan:</strong> ${agenda.nama_kegiatan}</p>
        <p><strong>Deskripsi Kegiatan:</strong> ${agenda.deskripsi_singkat}</p>
        <p><strong>Tanggal:</strong> ${agenda.tanggal_kegiatan}</p>
        <p><strong>Waktu:</strong> ${agenda.time_start} - ${agenda.time_end}</p>
        ${agenda.activity_picture ? `<img src="/storage/${agenda.activity_picture}" alt="Gambar Kegiatan" class="swal-image">` : ''}
    `,
});
}

function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Setelah dikonfirmasi, agenda ini akan dihapus dari tabel.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form secara manual setelah konfirmasi SweetAlert
            document.getElementById('delete-form-' + id).submit();
        }
    });
}