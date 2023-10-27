<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        "name",
        "admission_no",
        "class",
        "roll_no",
        "father_name",
        "mother_name",
        "dob",
        "course_fee",
        "address",
        'attendance',
        'sports_cultural_activities',
        'punctual_activities',
        'holiday_assignment',
        'totalmarks',
        'remarks'
    ];

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'marks', 'student_id', 'subject_id');
    }
}
