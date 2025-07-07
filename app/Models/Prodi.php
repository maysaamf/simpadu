<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    // 
    protected $table ='prodi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'Nama',
        'kaprodi',
        'jurusan',
    ];
    public function Prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id', 'id');
    }
}


