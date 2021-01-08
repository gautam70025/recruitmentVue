<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Job_post extends Model
{
  public function personal_details()
  {
    return $this->hasMany(Personal_detail::class);
  }
}
