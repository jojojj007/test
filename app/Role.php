<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   // protected $table ='roles';
    protected $fillable = ['symbol','name','detail','created_by','updated_by'];
    public function users()
	{
		return $this->hasMany('App\Users');
	}
}
