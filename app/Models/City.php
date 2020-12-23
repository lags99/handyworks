<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Specialization;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'longitude',
        'latitude'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function user_specializations()
    {
        return $this->hasManyThrough(Specialization::class, User::class);
    }
    public function filter_specialization($key, $value)
    {
        return $this->user_specializations->where($key, $value);
    }
}
