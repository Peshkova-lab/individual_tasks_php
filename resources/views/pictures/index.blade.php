@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
    {{ $pageTitle }}
@endsection

@section("page-content")
    <table class="table table-striped table-dark">
        <tr><th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th></tr>
        @foreach($pictures as $picture)
            <tr><td>{{$picture->number }}</td>
                <td>{{$picture->name }}</td>
                <td>{{$picture->author }} </td></tr>
        @endforeach
    </table>
@endsection
