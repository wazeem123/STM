<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    public function Teacher(){
        return $this->belongsTo('App\Teacher','teacher_id');
    }

    public function Subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }
}
