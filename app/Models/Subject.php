<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['subject_name'];

    public function marks()
    {
        return $this->hasOne(Mark::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'marks', 'subject_id', 'student_id');
    }
}
