<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OjtCoordinator extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ojtcoordinator';
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key column
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
