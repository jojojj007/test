<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $fillable = ['department_year_id','name',
    'risk_type_id','likelihood','risk_impact_id','impact',
    'risk_strategy_id','created_by','updated_by'];
    public function risk_factors()
	  {
		  return $this->hasMany('App\RiskFactor');
    }
    public function risk_activities()
	  {
		  return $this->hasMany('App\RiskActivity');
    }
    public function risk_results()
	  {
		  return $this->hasMany('App\RiskResult');
    }
    public function risk_indicators()
	  {
		  return $this->hasMany('App\RiskIndicator');
    }

    public function department_years()
	  {
		  return $this->belongs_to('App\DepartmentYear');
    }
    public function risk_types()
	  {
		  return $this->belongs_to('App\RiskType');
    }
    public function risk_impacts()
	  { 
		  return $this->belongs_to('App\RiskImpact');
    }
    public function risk_strategies()
	  {
		  return $this->belongs_to('App\RiskStrategy');
    }
    
}
