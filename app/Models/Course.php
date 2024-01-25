<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'course';
    protected $primaryKey = 'courseId';
    public $timestamps = true;

    protected $fillable = [
        'courseName',
        'yearSem',
    ];
    protected $dates = ['deleted_at'];
}
