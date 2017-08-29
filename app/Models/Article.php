<?php

namespace App\Models;

use App\User;
use App\Models\Status;
use App\Models\Content;
use App\Models\Category;
use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Article extends Model implements HasMediaConversions
{
	use HasMediaTrait;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'slug',
		'description',
		'keywords',
		'template_id',
		'user_id',
		'status_id',
	];
	
	/**
	 * Get the template record associated with the article.
	 */
	public function template()
	{
		return $this->belongsTo(Template::class);
	}
	
	/**
	 * Get the user record associated with the article.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	/**
	 * Get the status record associated with the article.
	 */
	public function status()
	{
		return $this->belongsTo(Status::class);
	}
	
	/**
	 * Get the content records associated with the article.
	 */
	public function contents()
	{
		return $this->belongsToMany(Content::class, 'article_content');
	}
	
	/**
	 * Set contents for the article.
	 *
	 * $param 	array 	$contents
	 */
	public function setContents(array $contents)
	{
		return $this->contents()->sync($contents);
	}
	
	/**
	 * Get the category records associated with the article.
	 */
	public function categories()
	{
		return $this->belongsToMany(Category::class, 'article_category');
	}
	
	/**
	 * Set categories for the article.
	 *
	 * $param 	array 	$categories
	 */
	public function setCategories(array $categories)
	{
		return $this->categories()->sync($categories);
	}
	
	public function registerMediaConversions()
    {
		$this->addMediaConversion('thumbnail')->width(368)->height(232)->sharpen(10);
    }
}
