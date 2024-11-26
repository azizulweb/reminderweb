@extends('layout.app')

@section('header')

@section('content')

<div class="container">

    {{-- Notifikasi hanya muncul sekali setelah operasi --}}
    @if(session('success'))
        @if(session('type') == 'store')
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @elseif(session('type') == 'update')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
        @elseif(session('type') == 'delete')
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
        @endif
    @endif

    <td>
        <h1 class="text-center">Daftar Agenda</h1>
    </td>

    {{-- <form method="GET" action="{{ route('agenda.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari agenda..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form> --}}
    
    <!-- Tabel agenda -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="agendaTable">
            <thead>
                <tr class="bg-dark text-white text-uppercase">
                    <th class="text-center" style="width: 1%;">No</th>
                    <th class="text-center" style="width: 15%;">Nama Kegiatan</th>
                    <th class="text-center" style="width: 15%;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $index => $agenda)
                <tr id="agenda-{{ $agenda->id }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $agenda->nama_kegiatan }}</td>
                    <td>
                        <button type="button" class="btn {{ $agenda->is_done ? 'btn-success' : 'btn-secondary' }}" 
                            id="status-button-{{ $agenda->id }}" onclick="handleStatusChange('{{ $agenda->id }}', {{ $agenda->is_done ? 'true' : 'false' }})">
                            {{ $agenda->is_done ? 'Selesai' : 'Belum' }}
                        </button>
                        <button type="button" class="btn btn-primary" onclick="handleViewDetails({{ json_encode($agenda) }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">
                        @if(request('search'))
                            Tidak ada agenda yang ditemukan untuk pencarian "{{ request('search') }}".
                        @else
                            Agenda kamu akan ditampilkan di sini.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>

{{-- SweetAlert dan script perubahan status --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
                <div style="text-align: left; font-size: 16px; line-height: 1.8;">
                    <p><strong>Nama Kegiatan</strong> : ${agenda.nama_kegiatan}</p>
                    <p><strong>Deskripsi Kegiatan</strong> : <br>${agenda.deskripsi_singkat}</p>
                    <p><strong>Tanggal</strong> : ${agenda.tanggal_kegiatan}</p>
                    <p><strong>Waktu</strong> : ${agenda.time_start} - ${agenda.time_end}</p>
                    ${
                        agenda.activity_picture
                            ? `<div style="margin-top: 15px; text-align: center;">
                                <img src="/storage/${agenda.activity_picture}" 
                                        alt="Gambar Kegiatan" 
                                        style="max-width: 100%; height: auto; border-radius: 8px;">
                            </div>`
                            : ''
                    }
                </div>
            `,
            showCloseButton: true,
            focusConfirm: false,
            confirmButtonText: 'Tutup'
        });
    }


</script>
@endsection

