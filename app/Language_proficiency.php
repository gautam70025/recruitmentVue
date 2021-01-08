<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Language_proficiency extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function job_post()
  {
    return $this->belongsTo(Job_post::class);
  }
}
