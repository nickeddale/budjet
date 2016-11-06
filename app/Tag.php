<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{

    protected $fillable = [
        'name',
        'category_id'
    ];
    //
    /**
     * a tag belongs to many tasks
     * get the tasks associated with a given tag
     * @return Eloquent\Releations\BelongsToMany
     */
    public function tasks()
    {
    	return $this->belongsToMany(Task::class(), 'task2tag')->withTimestamps();
    }

   //
    /**
     * a tag belongs to many invoices
     * get the invoices associated with a given tag
     * @return Eloquent\Releations\BelongsToMany
     */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class(), 'invoice2tag')->withTimestamps();
    }

    /**
     * for some reason it does not work with Category::class()
     * it also does not work without specifying category_id
     * a tag has one category
     * get the category associated with the tag
     * @return eloquent hasOne
     */
    public function categories()
    {
    	return $this->belongsTo( 'App\Category', 'category_id');
    }

    




}
