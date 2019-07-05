<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ['symbol','name','detail','created_by','updated_by'];
    public function department_years()
	{
		return $this->hasMany('App\DepartmentYear');
	}
}
