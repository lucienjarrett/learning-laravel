<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Http\Requests\ArticleRequest; 
use App\Article; 
use Carbon\Carbon;
//use Auth; 
//use Request; 
class ArticlesController extends Controller
{
    

    /**
    */
   public function __construct()
   {
    //$this->middleware('auth', ['only'=>'create']); 
    $this->middleware('auth'); 
       # code...
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return \Auth::user()->toArray(); 

		  $articles = Article::latest('published_at')->published()->get(); 
          return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(ArticleRequest $request)
		{
            $article = new Article($request->all());
            Auth::user()->articles()->save($article);  

				//Article::create($request->all());
				return redirect()->route('articles.index');


				//return redirect()->route('articles.show', $article->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		  $article = Article::findOrFail($id);
   
			//return $id; 
	 
		   return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			
		//dd($id);	
		$article = Article::findOrFail($id);
		return view('articles.edit', compact('article'));  
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
				$article->update($request->all());
				return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
