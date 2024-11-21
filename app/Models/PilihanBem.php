<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanBem extends Model
{
    use HasFactory;

    protected $fillable = ['nama_bem'];

    public function users()
    {
        return $this->hasMany(User::class, 'pilihan_bem_id');
    }
}
