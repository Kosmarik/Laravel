<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasksComments extends Model
{
    public function author(){
        return $this->hasOne('App\User', 'id', 'author_id');
    }
}
