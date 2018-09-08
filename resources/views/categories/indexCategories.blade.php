@extends('layout')

@section('content')
<a href="/posts/create" class="btn btn-sm btn-warning">Add Post</a>
<a href="/categories/create" class="btn btn-sm btn-warning">Add Category</a>
    <table class="table table-condensed table-striped table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Parent</th>
            <th>Name</th>
            <th>Created</th>
            <th colspan="2">Actions</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id}}</td>
                <td>{{ $category->parent}}</td>
                <td>{{ $category->cName}}</td>
                <td>{{ $category->created_at->toFormattedDateString()}}</td>
                <td><a href="/posts/edit/{{ $category->id}}" class="btn btn-sm btn-primary">Edit</td>
                <td><a href="/posts/delete/{{ $category->id}}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete?')">Delete</td>
            </tr>
        @endforeach
    </table>

@endsection