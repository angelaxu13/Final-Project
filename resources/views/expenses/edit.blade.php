@extends("layouts.main")

@section("title")
Edit: {{$expense->name}}
@endsection

@section("content")
     <form action="{{ route('expenses.update', [ 'id' => $expense->id ]) }}" method="POST">
         @csrf
         <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <input type="text" name="item" id="item" class="form-control" value="{{ old('item', $expense->name) }}">
            @error("item")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost', $expense->amount) }}">
            @error("cost")
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ (string) $category->id === (string) old('category', $expense->category->id) ? "selected" : "" }}>
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