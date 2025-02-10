<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'homeroom_teacher',
        'desk',
        'fan',
        'whiteboard',
        'status',
        'note'
    ];


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classes');
    }


}
