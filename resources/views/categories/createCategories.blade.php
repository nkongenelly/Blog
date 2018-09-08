@extends('layout')

@section('content')

<form class="form-horizontal" action="/categories" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <select name="parent" class="form-control" name="parent">
            <option>--No Parent--</option>
            @if(count($categories))
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->cName}}</option>
              @endforeach
            @endif
        </select>
    
      
    </div>
    <div class="form-group">
        <label for="title">Category Name</label>
        <input type="text" class="form-control" name="cName" placeholder="Enter Category Name">
        
    </div>
    <a href="/posts" class="btn btn-danger">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection