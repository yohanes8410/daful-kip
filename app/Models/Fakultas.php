<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Skema;

class Fakultas extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function skema()
    {
        return $this->belongsToMany(Skema::class);
    }
}
