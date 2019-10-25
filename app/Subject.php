<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    
    
    public function GroupSubject(){
        return $this->hasMany('App\GroupSubject');
    }

    public function TeacherSubject(){
        return $this->hasMany('App\GroupSubject');
    }

    public function GradeSubject(){
        return $this->hasMany('App\GradeSubject');
    } 
    public function Grades(){
        return $this->belongsToMany('App\Grade','grade_subjects');
    }
}
