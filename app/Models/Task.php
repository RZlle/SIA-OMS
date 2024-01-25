<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'task';
    protected $primaryKey = 'taskId';
    public $timestamps = true;

    protected $fillable = [
        'taskName',
        'taskStatus',
        'dateAccomplished',
        'taskdescription',
        'taskFile',
        // 'deadline',
        'dateStarted',
    ];

    protected $dates = ['deleted_at'];
}
