@extends("layout")

@section("app-title", "Author")
@section("page-title", "View of author")

@section("page-content")

    <h2 class="text-info">Author {{ $author->author }}</h2>
    <h5>Nationality {{ $author->nationality }}</h5>
    <h4>Picture  {{ $author->picture->name }}</h4>
    <a href="/authors" style="..." class="btn btn-outline-info">Return to list</a>
@endsection
