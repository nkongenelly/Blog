@extends('layout')

@section('content')
<div class="row">
    <div  class="col-md-8"> 
        <a href="/posts/create" class="btn btn-sm btn-warning">Add Post</a>
        <a href="/categories/create" class="btn btn-sm btn-warning">Add Category</a>
    
            
        <table class="table table-condensed table-striped table-bordered table-hover">
        
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Title</th>
                <th>Created</th>
                <th>Created By</th>
                <th>Body</th>
                <th colspan="3">Actions</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id}}</td>
                    <td>{{ $post->category->cName}}</td>   
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->created_at->toFormattedDateString()}}</td>
                    <td>{{ $post->user->name}}</td>
                    <td>{{ $post->body}}</td>
                
                    <td><a href="/posts/edit/{{ $post->id}}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td><a href="/posts/comments/{{ $post->id}}" class="btn btn-sm btn-success">Comments</a></td>
                    <td><a href="/posts/delete/{{ $post->id}}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete?')">Delete</a></td>     
                </tr>
                
            @endforeach
        </table>
         
    </div>
    
    <div class="col-md-4">
        <h3>Archives</h3>

        <ul class="list-group">
            @foreach($archives as $archive)
            <li class="list-group-item">
                <a href="/posts?month={{ $archive->month }}&year={{ $archive->year }}">
                            {{$archive->month.' '. $archive->year}}
                            ({{$archive->count}})
                    </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

    

@endsection