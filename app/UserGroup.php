<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
	public function user()
	{
		$this->belongsTo(User::class, 'group', 'id');
	}
}
