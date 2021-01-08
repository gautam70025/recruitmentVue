<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Diploma_name extends Model
{
  public function required_qualification()
  {
    return $this->belongsTo(Required_qualification::class);
  }
}
