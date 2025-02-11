<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{


    use HasFactory;

    protected $table ='study_classes';

    protected $fillable = [
        'name',
        'class_level_id',
        'homeroom_teacher',
        'desk',
        'fan',
        'whiteboard',
        'light',
        'status',
        'note'
    ];

    

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classes');
    }

}
