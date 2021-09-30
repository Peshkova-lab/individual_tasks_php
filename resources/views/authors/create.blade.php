@extends("layout")

@section("app-title", "Authors")
@section("page-title", "Add new author")

@section("page-content")

    <form method="post" action="/authors" class="text-left">
        {{ csrf_field() }}
    <div class="form-group">
        @include("includes/input", [
    'fieldId' => 'author',
    'labelText' => 'Author',
    'placeHolderText'=>'Input author'
])
    </div>
        <div class="form-group">
            @include("includes/input", [
   'fieldId' => 'nationality',
   'labelText' => 'Nationality',
   'placeHolderText'=>'Input nationality'
])
        </div>
        <div class="form-group">

            <label for="picture">Picture</label>
            <select class="browser-default custom-select" name="picture_id" id="picture">
                <option selected disabled value="0">Choose picture</option>

                    @foreach($pictures as $picture)
                        <option value="{{ $picture->id }}">{{ $picture->name }}</option>
                    @endforeach
            </select>
            @include("includes/validationErr", ['errFieldName' => "picture_id"])

        </div>
        <button type="submit" class="btn btn-primary float-right">Add</button>
        <div class="clearfix"></div>
    </form>
@endsection
