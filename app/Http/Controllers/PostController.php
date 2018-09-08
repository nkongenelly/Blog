<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts = Post::latest()
        //         ->filter(request()->only(['month','year']))
        //         ->get();
      
   
        $categories = Category::all();
        $archives = Post::selectRaw('year(created_at) as year, monthname (created_at) as month, count(*) as count')
                            ->groupBy('year', 'month')
                            ->orderByRaw('min(created_at) desc')
                            ->get();

        $posts = Post::latest();
            if($month = request('month')){
                $posts->whereMonth('created_at',Carbon::parse($month)->month);
            }
            if($year = request('year')){
                $posts->whereYear('created_at',$year);
            }
            $posts = $posts->get();
                        // ->filter(request()->only(['month','year']))
                        // ->get();
           
        return view('posts.index',compact(['posts','categories','archives']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required'
        ]);
            auth()->user()->publish(new Post(request(['category_id','title','body'])));
            
        // Post::create(request(['category_id','title','body']));
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $post = Post::find($id);
        $categories =Category::where('id', $id)
                ->select('title','body');

        return view('posts.edit',compact(['post','categories']));
    }

    public function comments($id)
    {
        //
        $post = Post::find($id);
        $categories =Category::where('id', $id)
                ->select('title','body');

        return view('posts.comments',compact(['post','categories']));
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
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
        ]);
        Post::where('id', $id)
            ->update(request(['title','body']));
            return redirect('/posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)
        ->delete();
        return redirect('/posts');
    }

    
}
