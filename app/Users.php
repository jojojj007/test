<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['department_id','employee_id',
    'role_id','created_by','updated_by'];
    public function roles()
	{
		return $this->belongs_to('App\Role');
    }
    public function departments()
	{
		return $this->belongs_to('App\Department');
	}
}
