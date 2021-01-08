<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  public function blocks()
  {
    return $this->hasMany(Block::class);
  }

}
