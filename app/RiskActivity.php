<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskActivity extends Model
{
    protected $fillable = ['risk_id','name','risk_activity_status_id',
    'deadline','oic','created_by','updated_by'];
    public function risk_activity_results()
	{
		return $this->hasMany('App\RiskActivityResult');
    }

    public function risks()
	{
		return $this->belongs_to('App\Risk');
    }
    public function risk_activity_statuses()
	{
		return $this->belongs_to('App\RiskActivityStatus');
    }
}
