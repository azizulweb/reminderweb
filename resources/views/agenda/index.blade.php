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
@endsection

