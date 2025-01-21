<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'full_name',
        'latin_name',
        'gender',
        'marital_status',
        'dob',
        'national_id',
        'subject_id',
        'specialization',
        'degree',
        'university',
        'email',
        'phone',
        'password',
        'hire_date',
        'created_by',
        'note',
        'email_verified_at',
    ];
}
