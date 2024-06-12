<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;
use App\Models\User;

class Jawaban extends Model
{
    use HasFactory;
    protected $fillable = ['pertanyaan_id', 'user_id', 'jawaban'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
