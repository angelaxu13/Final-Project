@extends("layouts.main")

@section("title")
Edit Your Comment
@endsection

@section("content")
     <form action="{{ route('comments.update', [ 'id' => $comment->id ]) }}" method="POST">
         @csrf
         <div class="mb-3">
            <label for="item" class="form-label">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" value="{{ old('comment', $comment->comment) }}">
            @error("comment")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection