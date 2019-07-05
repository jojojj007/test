<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskActivityStatus extends Model
{
    protected $fillable = ['symbol','name','detail','created_by','updated_by'];
    public function risk_activity_results()
	{
		return $this->hasMany('App\RiskActivityResult');
    }   
    public function risk_activities()
	{
		return $this->hasMany('App\RiskActivity');
    }
}
