@extends("layouts.main")

@section("title", "New Expense")

@section("content")
     <form action="{{ route('expenses.store') }}" method="POST">
         @csrf
         <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <input type="text" name="item" id="item" class="form-control" value="{{ old('item') }}">
            @error("item")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost') }}">
            @error("cost")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ (string) $category->id === (string) old('category') ? "selected" : "" }}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            @error("category")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection