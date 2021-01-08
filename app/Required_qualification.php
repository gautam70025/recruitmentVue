<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Required_qualification extends Model
{
  public function job_post()
  {
    return $this->belongsTo(Job_post::class);
  }
  public function diploma_names()
  {
    return $this->hasMany(Diploma_name::class);
  }
}
