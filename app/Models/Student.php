<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'student';
    protected $primaryKey = 'studentId';
    public $timestamps = true;

    protected $fillable = [
        'studentNo',
        'lastName',
        'firstName',
        'middleName',
        'suffix',
        'address',
        'birthday',
    ];

    // protected $dates = ['deleted_at'];
}
