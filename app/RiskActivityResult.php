<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskActivityResult extends Model
{
    protected $fillable = ['risk_activity_id','ordinal','risk_activity_status_id'
    ,'note','created_by','updated_by'];
    public function risk_activities()
	{
		return $this->belongs_to('App\RiskActivity');
    }
    public function risk_activity_results()
	{
		return $this->belongs_to('App\RiskActivityResult');
    }
}
