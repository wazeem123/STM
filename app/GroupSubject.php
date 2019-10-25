<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupSubject extends Model
{
    public function Subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

    public function Group(){
        return $this->belongsTo('App\Group','group_id');
    }
}
