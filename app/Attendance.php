<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    public function teacherAttendence(){
       return $this->belognsTo('App\Teacher','teacher_id'); 
    }
}
