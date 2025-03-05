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
<<<<<<< HEAD
        'light',
=======
>>>>>>> d30f86caf539abbbf8bdc31862175d8baeb7a1a3
        'status',
        'note'
    ];

    

<<<<<<< HEAD
    public function teachers()
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classes');
>>>>>>> d30f86caf539abbbf8bdc31862175d8baeb7a1a3
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class,'homeroom_teacher');
    }

<<<<<<< HEAD
=======
    public function level(){
        return $this->belongsTo(StudentLevel::class,'class_level_id');
    }


>>>>>>> d30f86caf539abbbf8bdc31862175d8baeb7a1a3
}
