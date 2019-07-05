<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentYear extends Model
{
    protected $fillable = ['department_id','year_id','confirmed_at','approve_at','confirmed_by','approved_by','created_by','updated_by'];
    public function risks()
	{
		return $this->hasMany('App\Risk');
    }
    public function departments()
	{
		return $this->belongs_to('App\Department');
    }
    public function years()
	{
		return $this->belongs_to('App\Year');
	}
}
