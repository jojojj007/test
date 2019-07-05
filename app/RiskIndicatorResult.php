<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskIndicatorResult extends Model
{
    protected $fillable = ['risk_indicator_id','ordinal','result',
    'created_by','updated_by'];
    public function risk_indicators()
	{
		return $this->belongs_to('App\RiskIndicator');
    }
}
