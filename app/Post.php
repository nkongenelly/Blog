<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //
    protected $guarded = [];

    public function category(){
       return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addComment($body){
        // dd($body);
        auth()->user->publishComment(
            new Post(request(['body']))
        );
        $this->comments()->create(compact("body"));
    }
        // Comment::create([
        //     'post_id'=>$this->id,
        //     'body'=> $body
        //     ]);
    //}
    public function scopeFilter($query,$filters)
    {
        // if($month = $filters['month']){
        //     $query->whereMonth('created_at',Carbon::parse($month)->month);
        // }
        // if($year = $filters['year']){
        //     $query->whereYear('created_at',$year);
        // }

        if (isset($filters['month'])) {

            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
            return view('posts.index');
        }
        
        if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
            return view('posts.index');
        }

        // $posts =$posts->get();
    }

}
