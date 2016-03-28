<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = array('name' ); 



    	/**
    	 * [articles description]
    	 * @return [type] [description]
    	 */
    	public function articles()
    	{

    		return $this->belongsToMany('App\Article'); 
    	}

}
