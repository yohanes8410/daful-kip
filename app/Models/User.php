<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Angkatan;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Skema;
use App\Models\Status;
use App\Models\Jawaban;
use App\Notifications\CustomResetPasswordNotification;


class User extends Authenticatable
{
    use Notifiable;

    // ...

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    // ...

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
