<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $primaryKey = 'attendanceId';

    protected $fillable = [
        'studentId',
        'attendDate',
        'timeIn',
        'timeOut',
    ];

    // Define relationships if needed
    // public function student()
    // {
    //     return $this->belongsTo(Student::class, 'student_id');
    // }
}
