@extends("layout")

@section("app-title", "List of pictures")
@section("page-title", "Add picture")

@section("page-content")
    <form method="post" action="/pictures" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pict-numb">Number</label>
            <input type="text" class="form-control" name="pict-numb" id="pict-numb" placeholder="Input number of picture">
        </div>
        <div class="form-group">
            <label for="pict-name">Name</label>
            <input type="text" class="form-control" name="pict-name" id="pict-name" placeholder="Input name of picture">
        </div>
        <div class="form-group">
            <label for="pict-author">Author</label>
            <input type="text" class="form-control" name="pict-author" id="pict-author" placeholder="Input author of picture">
        </div>

        <button type="submit" class="btn btn-primary float-right">Add</button>
    </form>
@endsection
