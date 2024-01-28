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
        "profile_pic",
        'attendance',
        'result_status',
        'sports_cultural_activities',
        'punctual_activities',
        'holiday_assignment',
        'totalmarks',
        'remarks',
        'mobile',
        'school_name',
        'school_code',
    ];

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function fee()
    {
        return $this->hasMany(Fee::class);
    }

    public function transfer_certificate()
    {
        return $this->hasOne(MigrationCertificate::class);
    }

}
