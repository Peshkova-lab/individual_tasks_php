@extends("layout")

@section("app-title", "Authors")
@section("page-title", "Edit author")

@section("page-content")
    <form method="post" action="/authors/{{ $author->id }}" class="text-left">
        @csrf
        @method("patch")
        <div class="form-group">

            @include("includes/input", [
    'fieldId'=> 'author', 'labelText'=>'Author',
    'placeHolderText'=>'Input author',
    'fieldValue'=>$author->author
])
        </div>

        <div class="form-group">
            @include("includes/input", [
    'fieldId'=> 'nationality', 'labelText'=>'Nationality',
    'placeHolderText'=>'Input nationality of author',
    'fieldValue'=>$author->nationality
])
        </div>

        <div class="form-group">
            <label for="picture">Picture</label>

            <select class="browser-default custom-select" name="picture_id"
                    id="picture">
                <option disabled value="0">Choose picture</option>
                @foreach($pictures as $picture)
                    <option @if($author->picture->id == $picture->id) selected @endif
                    value="{{ $picture->id }}">{{ $picture->name }}</option>
                @endforeach
            </select>
            @include("includes/validationErr", ['errFieldName' => "picture_id"])
        </div>

        <button type="submit" class="btn btn-primary float-right">Edit</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Submit delete of author</p>
                    </h5>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body text-left">
                    Delete author {{ $author->author }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-dismiss="modal">No</button>

                    <button type="button" class="btn btn-danger"
                            id="delete-author">Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function () {
            $("#delete-author").click(function () {
                var id - {!! $author->id !!} ;
                $.ajax({
                    url: '/authors/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token : "{!! csrf_token() !!}"
                    },

                    success:function (msg) {
                        location.href="/authors";
                    }
                });
            });
        });
    </script>
@endsection
