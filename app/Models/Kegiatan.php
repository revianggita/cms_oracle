<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan'; // ✔ HARUS SAMA DENGAN MIGRATION
    public $timestamps = false;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'waktu_mulai',
        'status',
        'token_link',
        'created_by'
    ];

    protected $casts = [
    // 'tanggal_kegiatan' => 'date',
    ];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'kegiatan_id', 'id');
    }
}