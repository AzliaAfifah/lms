<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blog()
    {
        return $this->belongsTo(BlogPost::class, 'blogpost_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id')->where('status',1); // Ganti 'comment_id' dengan nama kolom yang sesuai
    }
}
