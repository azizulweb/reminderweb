<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Agenda extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_kegiatan',
        'deskripsi_singkat',
        'tanggal_kegiatan',
        'activity_picture',
        'time_start',
        'time_end',
        'is_done'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
