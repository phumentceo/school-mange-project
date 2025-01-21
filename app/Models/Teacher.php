<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table = 'teachers';
    protected $fillable = [
        'first_name',
        'last_name',
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
        'phone_number',
        'password',
        'hire_date',
        'created_by',
        'note',
        'email_verified_at',
    ];

}
