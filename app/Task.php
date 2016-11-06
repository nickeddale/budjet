<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	"task_number",
    	"project_cost",
    	"actual_cost",
    	"number_of_units",
    	"unit_cost",
    	"unit",
        "invoice_id",
        "booked_month",
        "created_by",
        "last_update_by"

    ];

    /**
     * A task has one invoice
     * get the invoice associated with the task
     * @return Eloquent hasOne
     */
    public function invoices()
    {
    	return $this->belongsTo('App\Invoice', 'invoice_id');
    }


    /**
     * A task has many tags
     * get the tags associated with given task
     * @return Eloquent\Releations\BelongsToMany
     */
    public function tags()
    {
    	return $this->belongsToMany(Tag::class, 'task2tag')->withTimestamps();
    }

    /**
     * a task is created by one user
     * @return Eloquent belongsTo App\User
     */
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * a task is last updated by one user
     * @return Eloquent belongsTo App\User
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('App\User', 'last_update_by');
    }





    /**
     * Get a list of tag ids associated with the task
     * @return Array
     */
    public function getTagListAttribute()
    {

        return $this->tags()->pluck('tags.id')->all();
    }




}