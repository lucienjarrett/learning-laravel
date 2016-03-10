<?php
/**
 * Created by PhpStorm.
 * User: ljarrett
 * Date: 3/10/16
 * Time: 5:18 PM
 */

public function _construct(){
    $this->middleware('guest');
}

public function index()
{
    //return 'hello index world';
    return view('contact.index');
}
public function contact(){
   return view('contact.contact');
//return 'Hello world'
}