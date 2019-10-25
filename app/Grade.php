<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function GradeSubject(){
        return $this->hasMany('App\GradeSubject');
    } 
    
    public function Subjects(){
        return $this->belongsToMany('App\Subject','grade_subjects');
    }
}
