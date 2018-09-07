<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function categories(){
       return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){
        // dd($body);
        $this->comments()->create(compact("body"));
        // Comment::create([
        //     'post_id'=>$this->id,
        //     'body'=> $body
        //     ]);
    }

}
