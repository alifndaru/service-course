<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Lesson;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];

    protected $fillable = [
        'name', 'course_id'
    ];


    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('id', 'ASC');
    }
}
