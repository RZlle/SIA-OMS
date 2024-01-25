<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'faculty';
    protected $primaryKey = 'facultyId';
    public $timestamps = true;

    protected $fillable = [
        'lastName',
        'firstName',
        'middleName',
        'suffix',
        'address',
        'birthday',
    ];

    protected $dates = ['deleted_at'];
}
