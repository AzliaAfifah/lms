<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureChecklist extends Model
{
    use HasFactory;

    protected $table = 'lecture_checklists';

    protected $fillable = ['user_id', 'lecture_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lecture()
    {
        return $this->belongsTo(CourseLecture::class, 'lecture_id');
    }
}
