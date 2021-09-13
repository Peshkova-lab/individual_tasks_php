@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
    Home page
@endsection

@section("page-content")
    <table>
        <tr><th>Number</th>
            <th>Name</th>
            <th>Author</th></tr>
        @foreach($pictures as $picture)
        <tr><td>{{$picture['number'] }}</td>
            <td>{{$picture['name'] }}</td>
            <td>{{$picture['author'] }} </td></tr>
        @endforeach
    </table>
@endsection
