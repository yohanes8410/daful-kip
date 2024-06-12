<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;
use App\Models\User;

class Prodi extends Model
{
    use HasFactory;

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
