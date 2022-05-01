@extends("layouts.main")

@section("title")
    {{$expense->user->name}}'s Expense - {{$expense->name}}
@endsection

@section("content")
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<table class="table table-striped">
    @foreach ($comments as $comment)
        <tr>
            <td>
                @can('view-comment', $comment)
                    <a href="{{ route('comments.edit', [ 'id' => $comment->id ]) }}">Edit</a>
                @endcan
            </td>
            <td>
                {{$comment->comment}}
                <p>Posted on {{date_format( new DateTime($comment->created_at), 'n/j/Y')}} at {{date_format( new DateTime($comment->created_at), 'g:i A')}}</p>
            </td>
            <td>
                {{$comment->user->name}}
            </td>
            <td>
                @can('view-comment', $comment)
                    <form id="delete-form" method="POST" action="{{ route('comments.delete', [ 'id' => $comment->id ]) }}">
                        @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
</table>

@if($comments->count() == 0)
    No comments yet! Be the first to comment
@endif

<form method="post" action="{{ route('comments.store') }}">
    @csrf
    <div class="mb-3"></div>
    <div class="mb-3">
        <input type="text" name="comment" id="comment" class="form-control" value="{{ old('comment') }}">
        @error("answer")
           <small class="text-danger">{{$message}}</small>
       @enderror
    </div>
    <input type="hidden" name="expense" id="expense" value="{{$expense->id}}">
    <input type="submit" value="Add comment" class="btn btn-primary">
</form>
@endsection