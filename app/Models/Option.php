<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id', 'option'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
