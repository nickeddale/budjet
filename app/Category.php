<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name',
        'created_by',
        'last_update_by'
    ];

	/**
	 * a category has many tags
	 * get the tags associated with a category
	 * @return eloquent hasMany
	 */
	public function tags()
	{
		return $this->hasMany('App\Tag');
	}

    /**
     * a category is created by one user
     * @return Eloquent belongsTo App\User
     */
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * a category is last updated by one user
     * @return Eloquent belongsTo App\User
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('App\User', 'last_update_by');
    }

}
