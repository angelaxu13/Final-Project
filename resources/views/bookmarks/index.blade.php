@extends('layouts.main')

@section('title')
    {{ $user->name }}'s Bookmarks
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>User</th>
            <th>Item</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookmarks as $bookmark)
            <tr>
                <td>
                    {{$bookmark->user}}
                </td>
                <td>
                    {{$bookmark->expense}}
                </td>
                <td>
                    ${{$bookmark->amount}}
                </td>
                <td>
                    <p>Bookmarked on {{date_format( new DateTime($bookmark->created_at), 'n/j/Y')}} at {{date_format( new DateTime($bookmark->created_at), 'g:i A')}}</p>
                </td>
                <td>
                    <form id="delete-form" method="POST" action="{{ route('bookmarks.delete', [ 'id' => $bookmark->id ]) }}">
                    @csrf
                        <input type="submit" class="btn btn-danger" value="Remove">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mb-3">
@if($bookmarks->count() == 0)
    You haven't bookmarked any expenses. Add one now!
@endif
</div>


@endsection