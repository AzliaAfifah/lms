<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function languageCategory()
    {
        return $this->belongsTo(Category::class, 'language');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

}
