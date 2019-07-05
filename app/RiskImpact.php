<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskImpact extends Model
{
    protected $fillable = ['symbol','name','detail','created_by','updated_by'];
    public function risks()
	{
		return $this->hasMany('App\Risk');
	}
}
