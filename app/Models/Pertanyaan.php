<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jawaban;
use App\Models\Form;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'tipe', 'pertanyaan'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
