<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use Illuminate\Support\Str;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function excerpt()
    {
        return Str::limit($this->body, 100, '...');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
