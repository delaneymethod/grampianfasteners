<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

namespace App\Models;

use App\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    
	protected $characterSet = 'UTF-8';
	
	protected $flags = ENT_QUOTES;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'solution_id',
		'title',
		'default_location_id',
	];

	/**
	 * Get the user records associated with the company.
	 */
	public function users() : HasMany
	{
		return $this->hasMany(User::class);
	}
	
	/**
	 * Get the location records associated with the company.
	 */
	public function locations() : HasMany
	{
		return $this->hasMany(Location::class);
	}
}
