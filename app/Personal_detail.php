<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Personal_detail extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function job_post()
    {
      return $this->belongsTo(Job_post::class);
    }
    public function district()
    {
      return $this->belongsTo(District::class);
    }
    public function block()
    {
      return $this->belongsTo(block::class);
    }
    public function gram_panchyat()
    {
      return $this->belongsTo(Gram_panchyat::class);
    }
    public function c_district()
    {
      return $this->belongsTo(District::class);
    }
    public function c_block()
    {
      return $this->belongsTo(block::class);
    }
    public function c_gram_panchyat()
    {
      return $this->belongsTo(Gram_panchyat::class);
    }
}
