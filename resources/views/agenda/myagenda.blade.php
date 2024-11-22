@extends('layout.app')

@section('header')

@section('content')

@if(session('success'))
    @if(session('type') == 'delete')
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endif
    @php
        // Menghapus session setelah notifikasi ditampilkan
        session()->forget('success');
        session()->forget('type');
    @endphp
@endif

<div class="container">
    <div class="title-container" style="flex-grow: 1; text-align: left;">
        <a href="{{ route('agenda.create') }}" class="btn btn-primary ">Tambah Agenda</a>
    </div>
    <div>
        <h1 class="text-center">My Agenda</h1>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-hover table-bordered">
            <thead class="thead">
                <tr class="bg-dark text-white text-uppercase">
                    <th class="text-center" style="width: 1%;">No</th>
                    <th class="text-center" style="width: 35%;">Event</th>
                    <th class="text-center" style="width: 80%;">Deskription</th>
                    <th class="text-center" style="width: 10%;">Date</th>
                    <th class="text-center" style="width: 10%;">Time-start</th>
                    <th class="text-center" style="width: 10%;">Time-end</th>
                    <th class="text-center" style="width: 15%;">Dokumentasi</th>
                    <th class="text-center" style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $index => $agenda)
                <tr id="agenda-{{ $agenda->id }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-justify" style="word-wrap: break-word; white-space: normal;">
                        {{ $agenda->nama_kegiatan }}
                    </td>
                    <td class="text-justify" style="word-wrap: break-word; white-space: normal;">
                        {{ $agenda->deskripsi_singkat }}
                    </td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($agenda->tanggal_kegiatan)->format('d-m-Y') }}</td>
                    <td class="text-center">{{ $agenda->time_start }}</td>
                    <td class="text-center">{{ $agenda->time_end }}</td>
                    <td class="text-center">
                        @if($agenda->activity_picture)
                            <img src="{{ asset('storage/' . $agenda->activity_picture) }}" alt="Gambar Kegiatan" style="max-width: 100px; height: auto;">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif  
                    </td>                    
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $agenda->id }}')">Delete</button>
                        </div>
                        <form id="delete-form-{{ $agenda->id }}" action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Agenda kamu akan ditampilkan di sini</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>

@endsection
