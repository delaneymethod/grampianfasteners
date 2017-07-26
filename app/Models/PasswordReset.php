<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'token',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'token',
	];

	/**
	 * Get the user record associated with the user activation.
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'email');
	}
}