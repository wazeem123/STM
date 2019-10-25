<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function TeacherGrade(){
        return $this->hasMany('App\Grade');
    } 
    public function TeacherAttendance(){
        return $this->hasMany('App\Attendance');
    } 

   
    
    
    
}
