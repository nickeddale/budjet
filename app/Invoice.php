<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
    	'invoice_number',
        'invoice_description',
    	'cost',
    	'currency',
        'invoice_file',
    	'date_recieved',
    	'date_approved',
        'uploaded_by',
        'last_update_by'
    ];


    // eager load models by default 
    // relationships defined below
    protected $with = 
    [
        'uploadedBy',
        'lastUpdateBy'
    ];


    /**
     * a invoice has many tasks
     * get the tasks associated with the invoice
     * @return Eloquent hasMany
     */
    public function tasks()
    {
    	return $this->hasMany(Task::class());
    }


    /**
     * A invoice has many tags
     * get the tags associated with given invoice
     * @return Eloquent\Releations\BelongsToMany
     */
    public function tags()
    {
    	return $this->belongsToMany(Tag::class, 'invoice2tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the invoice
     * @return Array
     */
    public function getTagListAttribute()
    {

        return $this->tags()->pluck('tags.id')->all();
    }

   /**
     * a invoice is created by one user
     * @return Eloquent belongsTo App\User
     */
    public function uploadedBy()
    {
        return $this->belongsTo('App\User', 'uploaded_by');
    }

    /**
     * a invoice is last updated by one user
     * @return Eloquent belongsTo App\User
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('App\User', 'last_update_by');
    }

}
