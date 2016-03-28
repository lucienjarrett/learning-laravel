<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Http\Requests\ArticleRequest; 
use App\Article; 
use Carbon\Carbon;
use Auth; 
use App\Tag; 

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
        $tags = Tag::lists('name', 'id'); 
        return  view('articles.create', compact('tags'));
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
            //$article = new Article($request->all());

           
            //$article = Auth::user()->articles()->save($article); 
            $article = Auth::user()->articles()->create($request->all());
        
            
            //$tagIds = $request->input('tags'); 
            //dd($article->tags()->attach($request->input('tags')));

            $article->tags()->attach($request->input('tags'));  
            flash()->success('Your article has been created.');

//$request->session()->flash('flash_message', 'Your article has been created.');   

  //           $request->session()->flash('flash_message_important', true);      
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
    public function show(Article $article)
    {
        //  dd($id); 
       // $article = Article::findOrFail($id);
	 
		return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
		$tags = Tag::lists('name', 'id'); 
		return view('articles.edit', compact('article', 'tags'));  	
		
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
