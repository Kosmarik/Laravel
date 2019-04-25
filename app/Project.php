<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    public function tasks()
    {
        return $this->hasMany('App\Tasks', 'project_id', 'id');
    }

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'project_owner_id');
    }

    public function admin()
    {
        return $this->hasOne('App\User', 'id', 'admin_id');
    }
}
