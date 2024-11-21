<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanHima extends Model
{
    use HasFactory;

    protected $fillable = ['nama_hima'];

    public function users()
    {
        return $this->hasMany(User::class, 'pilihan_hima_id');
    }
}
