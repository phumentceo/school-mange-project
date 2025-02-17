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
        'hours_per_week',
        'grade',
        'book_number',
        'note',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function level(){
        return $this->belongsTo(StudentLevel::class,'grade');
    }
}
