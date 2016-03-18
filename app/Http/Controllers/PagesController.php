<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

public function about(){

 //   $name = [];
 //   $name['first'] = 'Jeffrey';
 //   $name['last'] = 'Way';

  $first = 'Meagon';
   $last = 'Fox';
    return view ('pages.about', compact('first', 'last'));

}


public function contact(){
	
	
 //$environment = App::environment(); 
// echo $environment;
   //return $environment; //view('articles.index', compact('articles'));
    return view ('pages.contact');

}


}
