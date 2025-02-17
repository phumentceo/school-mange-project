<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    protected $table = "teacher_schedules";
    protected $fillable = [
        "id",
        "teacher_id",
        "subject_id",
        "study_class_id",
        "student_level_id",
        "day",
        "start_time",
        "end_time",
    ];


    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function classroom(){
        return $this->belongsTo(StudyClass::class,'study_class_id');
    }
}
