<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;
use App\Models\Jawaban;


class Form extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi'];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
