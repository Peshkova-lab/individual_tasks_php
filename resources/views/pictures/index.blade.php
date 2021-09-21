@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
    {{ $pageTitle }}
@endsection

@section("page-content")
    <a href="/pictures/create" class="btn btn-outline-success float-left" style="margin-bottom: 10px;">Add picture</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr><th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($pictures as $picture)
            <tr><td>{{$picture->number }}</td>
                <td>{{$picture->name }}</td>
                <td>{{$picture->author }} </td>

                <td><a href="/pictures/{{ $picture->id }}/edit" class="btn btn-outline-primary">Edit</a> </td>
            </tr>
        @endforeach
    </table>
@endsection
