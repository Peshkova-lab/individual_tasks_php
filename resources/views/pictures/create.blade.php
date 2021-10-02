@extends("layout")

@section("app-title", "List of pictures")
@section("page-title", "Add picture")

@section("page-content")
    <form method="post" action="/author/{{ $author_filter_id }}/pictures" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">

            @include("includes/input", [
    'fieldId' => 'pict-numb', 'labelText' => 'Year',
    'placeHolderText' => "Input number of picture"
])
        </div>

        <div class="form-group">

     @include("includes/input", [
'fieldId' => 'pict-name', 'labelText' => 'Name',
'placeHolderText' => "Input name of picture"
])
        </div>
<div class="form-group">
    <label for="pict-author">Author</label>
    <select class="browser-default custom-select" name="pict-author"
            id="pict-author">
        <option selected disabled value="0">Choose author</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}"
            @if($author_filter_id == $author->id) selected @endif>
                {{ $author->author }}
            </option>
        @endforeach
    </select>
    @include('includes/validationErr', ['errFieldName' => "pict-author"])
</div>

<button type="submit" class="btn btn-primary float-right">Add</button>
<div class="clearfix"></div>
</form>
@endsection
