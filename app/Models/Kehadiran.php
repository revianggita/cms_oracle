<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    // nama tabel di Oracle
    protected $table = 'KEHADIRAN';

    // field yang boleh diinsert
    protected $fillable = [
        'kegiatan_id',
        'nama',
        'jabatan',
        'tim',
        'tanda_tangan',
        'waktu_absen',
    ];

    // karena Oracle pakai kolom custom
    public $timestamps = false;

    // relasi ke kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }
}