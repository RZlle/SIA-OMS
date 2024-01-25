<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $fillable = [
        'companyName',
        'address',
        'companyContact',
        'contactEmail',
        'contactNumber',
        'validityPeriod',
        'signedDate',
        'assignedStudents',
        'moaFile'
    ];

    // public $timestamps = false;

}
