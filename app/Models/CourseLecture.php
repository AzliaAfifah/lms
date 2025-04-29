<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLecture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function checklists()
    {
        return $this->hasMany(LectureChecklist::class, 'lecture_id');
    }

}
