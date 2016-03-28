<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //
   protected $fillable = [ 'title', 'body', 'published_at', 'user_id'];
	
   protected $table = 'Articles';  

   protected $dates = ['published_at']; 

   /**
    * [scopePublished description]
    * @param  [type] $query [description]
    * @return [type]        [description]
    */
	public function scopePublished($query)
	 {
		 $query ->where('published_at', '<=', Carbon::now());
		
	 }

	 /**
	  * [scopeUnpublished description]
	  * @param  [type] $query [description]
	  * @return [type]        [description]
	  */
	 public function scopeUnpublished($query)
	 {
		 $query ->where('published_at', '>', Carbon::now());
		
	 }
	 /**
	  * [setPublishedAttribute description]
	  * @param [type] $date [description]
	  */
	 public function setPublishedAttribute($date)
	 {
	 	 $this->attributes['published_at'] = Carbon::parse( $date); 
		
	 }

	
	/**
	 * An article is owned by a user. 
	 */
	public function user(){

		return $this->belongsTo('App\User'); 
	
	}

	/**
	 * [tags description]
	 * @return [type] [description]
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();

	}

	public function getTagListAttribute()
	{

		return $this->tags->lists('id'); 
	}
	
	 
}
