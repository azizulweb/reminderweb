// public/js/calendar.js

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: calendarEvents, // Variable ini akan diisi dari Blade
        dateClick: function (info) {
            Swal.fire({
                title: 'Tambah Agenda',
                html: `
                    <form id="calendarForm">
                        <input type="hidden" name="user_id" value="${authUserId}">
                        <input type="hidden" name="tanggal_kegiatan" value="${info.dateStr}">
                        <input type="text" name="nama_kegiatan" class="form-control mb-3" placeholder="Nama Kegiatan" required>
                        <textarea name="deskripsi_singkat" class="form-control mb-3" placeholder="Deskripsi Kegiatan" required></textarea>
                        <input type="time" name="time_start" class="form-control mb-3" required>
                        <input type="time" name="time_end" class="form-control mb-3" required>
                        <input type="file" name="activity_picture" class="form-control mb-3">
                    </form>
                `,
                confirmButtonText: 'Simpan',
                preConfirm: () => {
                    let formData = new FormData(document.getElementById('calendarForm'));
                    return fetch(calendarStoreUrl, { // URL akan diisi dari Blade
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).then(response => response.json());
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Berhasil!', 'Agenda berhasil ditambahkan.', 'success').then(() => {
                        window.location.reload();
                    });
                }
            });
        }
    });
    calendar.render();
});
