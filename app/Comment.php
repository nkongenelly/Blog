<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    //
    // public function addComment($body){
    //     $this->comments()->create(compact("body"));....in Post.php
    //     // Comment::create([
    //     //     'post_id'=>$this->id,
    //     //     'body'=> $body
    //     //     ]);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
