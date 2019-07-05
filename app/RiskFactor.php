<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskFactor extends Model
{
    protected $fillable = ['risk_id','detail','created_by','updated_by'];
    public function risks()
	{
		return $this->belongs_to('App\Risk');
    }

}
