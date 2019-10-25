<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSubject extends Model
{
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    public function Grade(){
        return $this->belongsTo('App\Grade');
    }
}
