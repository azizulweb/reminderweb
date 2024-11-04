@extends('layout.app')

@section('content')
    {{-- Form Input Agenda --}}
    <div>
        <h1 class="text-center">My Agenda</h1>
    </div>
    <div class="card mt-4">
        <div class="card-header">Form Agenda</div>
        <div class="card-body">
            <form action="{{ route('agenda.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_singkat" class="form-label">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_singkat" class="form-control" id="deskripsi_singkat" rows="10" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="form-control" id="tanggal_kegiatan" required>
                </div>
                <div class="mb-3">
                    <label for="time_start" class="form-label">Waktu Mulai</label>
                    <input type="time" name="time_start" class="form-control" id="time_start" required>
                </div>
                <div class="mb-3">
                    <label for="time_end" class="form-label">Waktu Selesai</label>
                    <input type="time" name="time_end" class="form-control" id="time_end" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Agenda</button>
                <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
