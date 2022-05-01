@extends('layouts.main')

@section('title', 'All Expenses')

@section('content')

     <table class="table">
        <thead>
            <tr>
            @if (Auth::check())
                <th>Bookmark</th>
            @endif
                <th>User</th>
                <th>Date</th>
                <th>Item</th>
                <th>Cost</th>
                <th>Category</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            @if ($expense->category->name === "Shopping")
                <tr style="background:#CBC3E3;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Restaurant/Drinks")
                <tr style="background:#ADD8E6;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Groceries")
                <tr style="background:#C1E1C1;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Exceptions")
                <tr style="background:#99b3dd;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Gas/Uber/Lyft")
                <tr style="background:#FAC898;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Miscellaneous")
                <tr style="background:#ffb6c1;">
                @if (Auth::check())
                    <td>
                        <form id="bookmark" method="POST" action="{{ route('bookmarks.store', [ 'id' => $expense->id ]) }}">
                            @csrf
                                <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </td>
                @endif
                    <td>
                        {{$expense->user->name}}
                    </td>
                    <td>
                        {{date_format($expense->created_at, 'n/j/Y')}}
                    </td>
                    <td>
                        {{$expense->name}}
                    </td>
                    <td>
                        ${{$expense->amount}}
                    </td>
                    <td>
                        {{$expense->category->name}}
                    </td>
                    <td>
                        <a href="{{ route('comments.index', [ 'id' => $expense->id ]) }}">{{$expense->comments->count()}} Comments</a>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>

 @endsection