@extends('layouts.main')

@section('title')
    {{ $user->name }}'s Expenses
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Item</th>
            <th>Cost</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
            @if ($expense->category->name === "Shopping")
                <tr style="background:#CBC3E3;">
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
                        <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                    </td>
                    <td>
                    <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                    @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    </td>
                </tr>
            @elseif ($expense->category->name === "Restaurant/Drinks")
            <tr style="background:#ADD8E6;">
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
                    <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                </td>
                <td>
                <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
            </tr>
            @elseif ($expense->category->name === "Groceries")
            <tr style="background:#C1E1C1;">
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
                    <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                </td>
                <td>
                <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
            </tr>
            @elseif ($expense->category->name === "Exceptions")
            <tr style="background:#99b3dd;">
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
                    <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                </td>
                <td>
                <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
            </tr>
            @elseif ($expense->category->name === "Gas/Uber/Lyft")
            <tr style="background:#FAC898;">
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
                    <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                </td>
                <td>
                <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
            </tr>
            @elseif ($expense->category->name === "Miscellaneous")
            <tr style="background:#ffb6c1;">
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
                    <a href="{{ route('expenses.edit', [ 'id' => $expense->id ]) }}">Edit</a>
                </td>
                <td>
                <form id="delete-form" method="POST" action="{{ route('expenses.delete', [ 'id' => $expense->id ]) }}">
                @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

<div class="mb-3">
@if($expenses->count() == 0)
    You haven't added any expenses. Add one now!
@endif
</div>

<div class="mb-3"></div>

<div class="mb-3">
    <a class="btn btn-primary" href="{{ route('expenses.create') }}">New expense</a>
</div>

@endsection