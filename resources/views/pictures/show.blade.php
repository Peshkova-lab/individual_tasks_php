@extends("layout")

@section("app-title")
    List of pictures
@endsection

@section("page-title")
    View data of picture
@endsection

@section("page-content")

    <h2>Picture {{ $picture->name }}</h2>
    <h3>Author {{ $picture->author }}</h3>
    <h5>Number {{ $picture->number }}</h5>

    <a href="/pictures" style="margin-top: 30px;"
       class="btn btn-outline-info">Return to list</a>
@endsection
