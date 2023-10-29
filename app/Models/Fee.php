<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_no',
        'student_id',
        'admission_no',
        'amount',
        'payment_mode'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
