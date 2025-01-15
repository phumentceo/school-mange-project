<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'subject_name',
        'subject_type',
        'credit',
        'grade',
        'book_number',
        'note',
    ];
}
