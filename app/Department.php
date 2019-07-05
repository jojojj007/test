<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_code','name','created_by','updated_by'];
    public function users()
	{
		return $this->hasMany('App\Users');
	}
    public function department_years()
	{
		return $this->hasMany('App\DepartmentYear');
	}
}
