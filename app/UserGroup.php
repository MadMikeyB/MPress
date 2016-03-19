<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @see \Seeder\GroupSeeder for default Groups
 * @see \App\Http\AdminMiddleware for Admin Check
 * @see \App\User for isAdmin check
 */

class UserGroup extends Model
{
	public function user()
	{
		$this->belongsTo(User::class, 'group', 'id');
	}
}
