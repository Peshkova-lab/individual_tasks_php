@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
{{ $pageTitle }}
@endsection

@section("page-content")
    <table>
        <tr><th>Number</th>
            <th>Name</th>
            <th>Author</th></tr>
        @foreach($pictures as $picture)
        <tr><td>{{$picture->getNumber() }}</td>
            <td>{{$picture->getName() }}</td>
            <td>{{$picture->getAuthor() }} </td></tr>
        @endforeach
    </table>
@endsection
