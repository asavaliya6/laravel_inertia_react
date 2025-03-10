<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'student_id';
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $fillable = [
        'first_name',
        'last_name',
        'department',
        'email',
    ];
}
