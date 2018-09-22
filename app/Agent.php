<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
  protected $fillable = [
      'name', 'email', 'phone',
  ];


  public function scopeCalls()
  {
    return $this->hasMany('\App\Call');
  }

  public function scopeExtraEvals()
  {
    return $this->hasMany('\App\ExtraEval');
  }

  public function monthEvaluation($month, $year)
  {
     if($this->hasMonthEvaluation($month,$year))
      return $this->calls()->where("month", "=",$month)->where("year","=",$year)->get()->avg('evaluation');
     else {
       return 0;
     }


  }

  public function hasMonthEvaluation($month,$year)
  {
     if($this->calls()->count() == 0)
     {
       return false;
     }
     else {
       return true;
     }
  }

  public function hasMonthProductivity($month,$year)
  {
    if($this->extraEvals()->count() == 0)
    {
      return false;
    }
    else {
      return true;
    }
  }
  public function hasMonthTest($month,$year)
  {
    if($this->extraEvals()->count() == 0)
    {
      return false;
    }
    else {
      return true;
    }
  }

   public function monthProductivity($month,$year)
   {
        if($this->hasMonthProductivity($month,$year))
       return $this->extraEvals()->where("month", "=" , $month)->where("year", "=", $year)->get()[0]->productivity;
       else {
         return 0;
       }
   }

    public function monthPerformance($month, $year)
    {

       $qa = $this->monthEvaluation($month,$year)/2;
       $prod = $this->monthProductivity($month,$year);
       $test = $this->monthTest($month,$year);

       return $qa + $prod + $test;
    }
   public function monthTest($month,$year)
   {
       if($this->hasMonthTest($month,$year))
       return  $this->extraEvals()->where("month", "=" , $month)->where("year", "=", $year)->get()[0]->test;
         else {
           return 0;
         }
   }

  public function weekEvaluation($week,$month,$year)
  {
    return $this->calls()->where("week","=",$week)->where("month", "=",$month)->where("year","=",$year)->get()->avg('evaluation');
  }
  public function numberOfCalls()
  {
     return $this->calls()->count();
  }
}
