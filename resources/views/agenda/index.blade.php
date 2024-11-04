@extends('layout.app')

@section('header')

@section('content')

<div class="container">

    {{-- @if(session('success'))
        @php
        $type = session('type');
        $alertClass = '';

        switch ($type) {
            case 'store':
                $alertClass = 'alert-info';
                break;
            case 'update':
                $alertClass = 'alert-warning';
                break;
            case 'delete':
                $alertClass = 'alert-danger';
                break;
            default:
                $alertClass = 'alert-info';
                break;
        }
        @endphp
        <div class="alert {{ $alertClass }}">
            {{ session('success') }}
        </div>
    @endif --}}
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
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="agendaTable">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%;" >No</th>
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
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">Agenda kamu akan ditampilkan di sini</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Button untuk menambah agenda baru -->
        <div class="title-container" style="flex-grow: 1; text-align: center;">
            <a href="{{ route('agenda.create') }}" class="btn btn-primary ">Tambah Agenda</a>
        </div>
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

</script>
@endsection

{{-- <script>
    function updateStatus(id, isDone) {
        if (!isDone) {
            // Jika status "Belum", ubah tombol menjadi "Selesai"
            document.getElementById('status-button-' + id).classList.remove('btn-secondary');
            document.getElementById('status-button-' + id).classList.add('btn-success');
            document.getElementById('status-button-' + id).innerText = 'Selesai';
            
            // Setelah tombol diubah menjadi "Selesai", tambahkan event konfirmasi penghapusan
            document.getElementById('status-button-' + id).onclick = function() {
                confirmDelete(id);
            };

            // Update status di server
            fetch(`/agenda/destroy/${id}`, {
                method: 'delete',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).catch(error => console.log(error));
        }
    }

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Setelah konfirmasi, agenda ini akan dihapus dari tabel.",
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
            }
        });
    }
</script> --}}

{{-- <script>
    function updateStatus(id, isDone) {
        const button = document.getElementById('status-button-' + id);
        
        if (button) {
            if (!isDone) {
                // Jika status belum selesai, ubah menjadi "Selesai"
                button.classList.remove('btn-secondary');
                button.classList.add('btn-success');
                button.innerHTML = 'Selesai';

                // Ubah tombol menjadi berfungsi untuk konfirmasi penghapusan
                button.onclick = function() {
                    confirmDelete(id);
                };

                // Mengupdate status di server dengan menggunakan fetch
                fetch(`/agenda/updateStatus/${id}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ is_done: true })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Berhasil!', 'Status agenda berhasil diperbarui.', 'success');
                    } else {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat memperbarui status.', 'error');
                    }
                })
                .catch(error => console.log('Error:', error));
            }
        } else {
            console.log('Button dengan ID: ' + id + ' tidak ditemukan.');
        }
    }

    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Setelah konfirmasi, agenda ini akan dihapus dari tabel.",
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
            }
        });
    }

</script> --}}

