@extends('layout')

@section('content')
<a href="/posts/create" class="btn btn-sm btn-warning">Add Post</a>
<a href="/categories/create" class="btn btn-sm btn-warning">Add Category</a>
    @foreach($categories as $category)  

        <table class="table table-condensed table-striped table-bordered table-hover">
        
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Title</th>
                <th>Created</th>
                <th>Body</th>
                <th colspan="3">Actions</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id}}</td>
                    <td value="{{$post->id}}">{{ $category->parent}}</td>   
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->created_at->toFormattedDateString()}}</td>
                    <td>{{ $post->body}}</td>
                
                    <td><a href="/posts/edit/{{ $post->id}}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td><a href="/posts/comments/{{ $post->id}}" class="btn btn-sm btn-success">Comments</a></td>
                    <td><a href="/posts/delete/{{ $post->id}}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete?')">Delete</a></td>     
                </tr>
                
            @endforeach
        </table>

    @endforeach

@endsection