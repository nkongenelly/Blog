@extends('layout')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#commentModal">
Add Comment
</button>
<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
   <form action="/comments" method="POST" class="form-horixontal">
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add {{$post->title}} Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <label>Comment Description</label>
                        <textarea class="form-control" placeholder="Comment description" name="body">
                        </textarea>
                    </div>          
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </div>
      </form> 
   </div>
</div>

    @if(count($post->comments))
        
            <table class="table table-condensed table-striped table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>Create</th>
                    <th>Created By</th>
                    <th>Body</th>
                    <th colspan="3">Actions</th>
                </tr>
                @foreach($post->comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->body }}</td>
                   
                    <td><!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$comment->id}}">
                    Edit
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="editModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="/comments/{{$post->id}}/{{$comment->id}}" method="POST" class="form-horixontal">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH')}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label>Comment Description</label>
                                                <textarea class="form-control" name="body">{{$comment->body}}
                                                </textarea>
                                            </div>          
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit Comment</button>
                                    </div>
                                </div>
                            </form> 
                    </div>
                    </div>
                    </td>

                    <td><a href="/posts/comments/{{ $post->id}}" class="btn btn-sm btn-success">Comments</a></td>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <td><a href="/comments/{{ $comment->id}}" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete?')">Delete</a></td>
                @endforeach
                </tr>
            </table>

    @endif
@endsection