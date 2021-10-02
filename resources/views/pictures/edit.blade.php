@extends("layout")

@section("app-title", "List of picture")
@section("page-title", "Edit picture")

@section("page-content")
    <form method="post" action="/pictures/{{ $picture->id }}" class="text-left">
        @csrf

        {{ method_field("patch") }}
        <div class="form-group">
            <label for="pict-numb">Year</label>
            <input type="text" class="form-control" name="number" id="pict-numb" placeholder="Input number of picture" value="{{ old('number') ? old('number') : $picture->number }}">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('number') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="pict-name">Name</label>
            <input type="text" class="form-control" name="name" id="pict-name" placeholder="Input name of picture" value="{{ old('name') ? old('name') : $picture->name }}">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="pict-author">Author</label>
            <input type="text" class="form-control" name="author" id="pict-author" placeholder="Input author of picture" value="{{ old('author') ? old('author') :$picture->author }}">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('author') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit</button>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Delete
        </button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Submit delete of picture</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body text-left">
                    Delete picture {{ $picture->name }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>

                    <button type="button" class="btn btn-danger" id="delete-picture">Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function () {
            $("#delete-picture").click(function () {
                var id - {!! $picture->id !!} ;
                $.ajax({
                    url: '/pictures/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token : "{!! csrf_token() !!}"
                    },

                    success:function (msg) {
                        location.href="/pictures";
                    }
                });
            });
        });
    </script>
@endsection
