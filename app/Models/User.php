<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'prodi', 'pilihan_bem_id', 'pilihan_hima_id'];

    public function pilihanBem()
    {
        return $this->belongsTo(PilihanBem::class, 'pilihan_bem_id');
    }

    public function pilihanHima()
    {
        return $this->belongsTo(PilihanHima::class, 'pilihan_hima_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'id'); // 'prodi' adalah foreign key di tabel user
    }
}
