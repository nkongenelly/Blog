@extends('layout')

@section('content')

<form class="form-horizontal" action="/categories" method="POST">
    {{csrf_field()}}
  <div class="form-group">
    <select name="parent" class="form-control">
      <option>Laravel</option>
      <option>Azure</option>
      <option>Php</option>
      <option>React</option>
      <option>Node</option>
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