<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
    protected $fillable = ['nip', 'nama', 'tgl_lahir', 'jk'];

    public function mapel()
    {
        return $this->belongsTo(mapel::class, 'mapel_id');
    }

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'siswa_id');
    }
}
