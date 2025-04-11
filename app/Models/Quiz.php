<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function getQuestionCountByCourse()
{
    return self::select('course_id', DB::raw('COUNT(*) as total_questions'))
        ->groupBy('course_id')
        ->get();
}

}
