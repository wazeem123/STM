<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public function Grade(){
        return $this->belongsTo('App\Grade','grade_id');
    }
    public function Teacher(){
    
        return $this->belongsTo('App\Teacher','teacher_id');
    }

    public function Subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

    public function Period(){
        return $this->belongsTo('App\Period','period_id');
    }
}
