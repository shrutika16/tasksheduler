<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'task';
    public $timestamps = false;
    protected $fillable = [
        'title', 'description', 'assign_to','task_due'
    ];

    public function getUser(){
        return $this->belongsTo('App\User', 'assign_to', 'id');
    }

    public function getAdmin(){
        return $this->belongsTo('App\User', 'assign_by', 'id');
    }
}
