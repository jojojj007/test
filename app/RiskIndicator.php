<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskIndicator extends Model
{
    protected $fillable = ['risk_id','name','goal','created_by','updated_by'];
    public function risk_indicator_results()
	{
	    return $this->hasMany('App\RiskIndicatorResult');
    }
    public function risks()
	{
	  	return $this->belongs_to('App\Risk');
    }
}
