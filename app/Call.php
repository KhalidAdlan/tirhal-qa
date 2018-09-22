<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
  protected $fillable = [
      'details', 'agent_id', 'cusPhone', 'remark', 'evaluation', 'week', 'month', 'year',
  ];

    public function agent()
    {
      return $this->hasOne('App\Agent');
    }
}
