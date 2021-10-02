@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
    {{ $pageTitle }}
@endsection

@section("page-content")
    <div class="form-group">
        <select class="browser-default custom-select" name="pict-author-filter"
                id="pict-author-filter">
            <option value="0">All authors</option>

            @foreach($authors as $author)
                <option
                    @if($author->id==$author_filter_id)
                selected @endif value="{{ $author->id }}">{{ $author->author }}</option>
            @endforeach
        </select>

        <script>
            $('#pict-author-filter').change(() => {
                var id = $('#pict-author-filter').val();
                var url = "/author/" + id + "/pictures";
                location.href = url;
            });
        </script>
    </div>

    <a href="/author/{{ $author_filter_id }}/pictures/create" class="btn btn-outline-success float-left" style="margin-bottom: 10px;">Add picture</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr><th scope="col">Year</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($pictures as $picture)
            <tr><td>{{$picture->number }}</td>
                <td>{{$picture->name }}</td>
                <td>{{$picture->authorF->author }} </td>

                <td><a href="/author/{{ $author_filter_id }}/pictures/{{ $picture->id }}" class="btn btn-outline-secondary">View</a>
                    <a href="/author/{{ $author_filter_id }}/pictures/{{ $picture->id }}/edit" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
