<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirements extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'requirements';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'dateSubmitted',
        'reqFile',
        'reqName',
        'reqType',
        'reqStatus',
    ];
    protected $dates = ['deleted_at'];
}

