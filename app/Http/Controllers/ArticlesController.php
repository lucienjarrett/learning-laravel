<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Article; 
use Carbon\Carbon;
use Request; 
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $articles = Article::latest('published_at')->published()->get(); //all();
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
    public function store()
		{
			
			
			//$input = Request::all(); 
			//$input['published_at'] = Carbon::now();
			//Article::create($input); 
			
			//$input = Request::all(); 
			//$input['published_at'] = Carbon::now();
			Article::create(Request::all());
			
			//Log::info($error);
		
//			$this->validate($request, [
	//						'title'=>'required|max:255', 
		//					'body'=>'required'
			//					]); 
		
							
			
						//$article = new Article(); 
						//$article ->title = $request->title; 
						//$article ->body = $request->body; 
						//$article->published_at = Carbon::now(); 
						//$article->save(); 
			
						
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
   
			dd($article->published_at);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
