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
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead">
                <tr>
                    <th class="text-center" style="width: 1%;" >No</th>
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
                    <td>{{ $index + 1 }}</td>
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
                        <img src="{{ asset('storage/' . $agenda->activity_picture) }}" alt="Gambar Kegiatan" width="100%">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif  
                    </td>                    
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Ubah button delete -->
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $agenda->id }}')">Delete</button>
                        </div>
                        <!-- Form delete dengan id unik -->
                        <form id="delete-form-{{ $agenda->id }}" action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Agenda kamu akan ditampilkan disini</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
