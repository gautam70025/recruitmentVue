<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Application_number extends Model
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
