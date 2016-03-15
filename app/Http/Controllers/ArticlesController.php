<?php

namespace App\Http\Controllers;
use App\Article;
//use Illuminate\Http\Request;


//use App\Http\Requests;
use Requests;


class ArticlesController extends Controller
{
    //

    public function index()
    {

       $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
       // dd($article);

        return view('articles.show', compact('article'));

    }

    public function create(){

        return view('articles.create');
    }

    public function store(){

       $input = Requests::all();

        dd($input);

        return $input;
    }

}