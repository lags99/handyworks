<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = ['interview_date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interview_date()
    {
        return Carbon::parse($this->interview_date);
    }
}
