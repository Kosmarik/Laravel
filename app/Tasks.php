<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Tasks extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    public function status(){
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function project(){
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function priority(){
        return $this->hasOne('App\Priority', 'id', 'priority_id');
    }

    public function author(){
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function client(){
        return $this->hasOne('App\User', 'id', 'client_id');
    }

    public function imone(){
        return $this->hasOne('App\Companies', 'id', 'client_id');
    }



}
