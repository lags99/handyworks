<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Specialization;
use App\Models\Interview;
use App\Models\City;
use App\Models\Certificate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'gender',
        'birth_date',
        'email',
        'password',
        'city_id',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkIfCompleted()
    {
        return $this->profile_picture !== "no_profile.jpg" && $this->specializations->contains('user_id', $this->id) && $this->street_address && $this->postal_code && $this->phone;
    }

    public function getAvatar()
    {
        if (Storage::disk('public')->exists('/profile_pictures/' . $this->profile_picture)) {
            return asset('storage/profile_pictures/' . $this->profile_picture);
        }
        return $this->profile_picture;
    }
    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
    public function interview()
    {
        return $this->hasOne(Interview::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function formatDate($date)
    {
        return Carbon::parse($date)->toDayDateTimeString();
    }
}
