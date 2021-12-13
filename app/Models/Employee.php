<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'photo',
        'designation_id',
//        'password',
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
