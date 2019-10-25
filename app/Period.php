<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public function PeriodGrade6(){
        return $this->hasMany('App\Grade6');

    }

    public function PeriodGrade7(){
        return $this->hasMany('App\Grade7');

    }

    public function PeriodGrade8(){
        return $this->hasMany('App\Grade8');
    }

    public function PeriodGrade9(){
        return $this->hasMany('App\Grade9');
    }
    public function PeriodGrade10(){
        return $this->hasMany('App\Grade9');
    }
    public function PeriodGrade11(){
        return $this->hasMany('App\Grade9');
    }

    public function PeriodGrade12(){
        return $this->hasMany('App\Grade9');
    }
    public function PeriodGrade13(){
        return $this->hasMany('App\Grade9');
    }
}
