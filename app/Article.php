<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //
   protected $fillable = [ 'title', 'body', 'published_at'];
	 //protected $dates = ['published_at']; 
	// protected $table = 'articles'; 
	/*
	 public static function validate($input) {
	                 $rules = array(
										 'title'=>'required|max:255', 
										 'body'=> 'required',
										 'published_at'=>'required'
	                 );
									 return Validator::make($input, $rules);
									 
								 }
	 
	 */
	 public function scopePublished($query)
	 {
		 $query ->where('published_at', '<=', Carbon::now());
		
	 }
	 public function scopeUnpublished($query)
	 {
		 $query ->where('published_at', '>', Carbon::now());
		
	 }
	 
	 public function setPublishedAttribute($date)
	 {
	 	 $this->attributes['published_at'] = Carbon::parse( $date); 
		
	 }
}
