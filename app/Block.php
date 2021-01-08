<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
  public function gram_panchyats()
  {
    return $this->hasMany(Gram_panchyat::class);
  }
  public function district()
  {
    return $this->belongsTo(District::class);
  }

}
