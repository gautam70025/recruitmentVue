<?php

namespace App;
// use Illuminate\Database\Eloquent\Model;

class Work_experience extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function job_post(){
        return $this->belongsTo(Job_post::class);
    }
}
