@extends("layout")

@section("app-title", "List of picture")
@section("page-title", "Edit picture")

@section("page-content")
    <form method="post" action="/pictures/{{ $picture->id }}" class="text-left">
        @csrf

        {{ method_field("patch") }}
        <div class="form-group">
            <label for="pict-numb">Number</label>
            <input type="text" class="form-control" name="pict-numb" id="pict-numb" placeholder="Input number of picture" value="{{ $picture->number }}">
        </div>
        <div class="form-group">
            <label for="pict-name">Name</label>
            <input type="text" class="form-control" name="pict-name" id="pict-name" placeholder="Input name of picture" value="{{ $picture->name }}">
        </div>
        <div class="form-group">
            <label for="pict-author">Author</label>
            <input type="text" class="form-control" name="pict-author" id="pict-author" placeholder="Input author of picture" value="{{ $picture->author }}">
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit</button>
    </form>
@endsection
