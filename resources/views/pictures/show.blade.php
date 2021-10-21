@extends("layout")

@section("app-title")
    List of pictures
@endsection

@section("page-title")
    View data of picture
@endsection

@section("page-content")

    <h2>Picture {{ $picture->name }}</h2>
    <h3>Author {{ $picture->authorF->author }}</h3>
    <h5>Year {{ $picture->number }}</h5>

    <a href="/author/{{ $author_filter_id }}/pictures" style="margin-top: 30px;"
       class="btn btn-outline-info">Return to list</a>
@endsection
