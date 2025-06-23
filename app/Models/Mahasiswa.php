<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    protected $keyType = 'string';

    protected $fillable = [
        'NIM',
        'Nama',
        'Tanggal_Lahir',
        'No_hp',
        'email',
        'password',
        'foto',
        'id'
    ];
    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id', 'id');
    }
}
