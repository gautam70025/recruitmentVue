<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Gram_panchyat extends Model
{

  public function block()
  {
    return $this->belongsTo(Block::class);
  }

}
