<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function GroupSub(){
        return $this->hasMany('App\GroupSubject');
    }
}
