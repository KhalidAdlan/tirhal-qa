<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraEval extends Model
{
    protected $fillable = [ 'productivity' , 'test' , 'agent_id' ,'month' , 'year'];
}
