@extends('layout.app')

@section('header')

@section('content')

<div class="container">
    <h2>Edit Agenda</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('agenda.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ $edit->nama_kegiatan }}" required>
        </div>
        <!-- Deskripsi Kegiatan -->
        <div class="form-group">
            <label for="deskripsi_singkat">Deskripsi Kegiatan</label>
            <textarea name="deskripsi_singkat" class="form-control" rows="3" required>{{ $edit->deskripsi_singkat }}</textarea>
        </div>

        <!-- Tanggal dan Waktu -->
        <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal dan Waktu</label>
            <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ \Carbon\Carbon::parse($edit->tanggal_kegiatan)->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Time Start -->
        <div class="form-group">
            <label for="time_start">Waktu Mulai</label>
            <input type="time" name="time_start" class="form-control" value="{{ $edit->time_start }}" required>
        </div>

        <!-- Time End -->
        <div class="form-group">
            <label for="time_end">Waktu Selesai</label>
            <input type="time" name="time_end" class="form-control" value="{{ $edit->time_end }}" required>
        </div>

        <!-- Checkbox untuk Selesai/Belum -->
        <div class="form-check">
            <input type="hidden" name="is_done" value="0"> <!-- Nilai default -->
            <input 
                type="checkbox" 
                name="is_done" 
                value="1" 
                class="form-check-input" 
                {{ $edit->is_done ? 'checked' : '' }}
            >
            <label class="form-check-label" for="is_done">Sudah Selesai</label>
        </div>        

        <!-- Dokumentation -->
        <div class="form-group">
            <label for="activity_picture">Gambar Kegiatan</label>
            <input type="file" name="activity_picture" class="form-control">
            @if($edit->activity_picture)
                <img src="/storage/{{ $edit->activity_picture }}" alt="Gambar Kegiatan" style="width: 100px; margin-top: 10px;">
            @endif
        </div>        

        <!-- Button Update -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
