@extends('layout')

@section('content')

<form class="form-horizontal" action="/posts" method="POST">
    {{csrf_field()}}
  <div class="form-group">
  <label for="title">Choose Category</label>
    <select name="category_id">
    @foreach($categories as $category)
        <option value="{{$category->id}}">
            {{$category->cName}}
        </option>
        @endforeach
    </select>
    
  </div>
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
    
  </div>
  <div class="form-group">
    <label for="body">Post Body</label>
    <textarea class="form-control" name="body" placeholder="Enter Post Body"></textarea>
  </div>
  <a href="/posts" class="btn btn-danger">Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection