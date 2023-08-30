<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Course;

class MyCourse extends Model
{
    use HasFactory;

    protected $table = 'my_courses';
    protected $fillable = [
        'course_id', 'user_id'
    ];


    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
