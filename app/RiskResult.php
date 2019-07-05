<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskResult extends Model
{
    protected $fillable = ['risk_id','ordinal','likelihood','impact',
    'created_by','updated_by'];
    public function risks()
	{
		return $this->belongs_to('App\Risk');
    }
}
