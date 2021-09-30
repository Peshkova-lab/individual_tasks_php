@extends("layout")

@section("app-title", "Authors")
@section("page-title", "Authors of pictures")

@section("page-content")
    <a href="/authors/create" class="btn btn-outline-success float-left" style="...">Add Author</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Author</th>
            <th scope="col">Nationality</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->author }}</td>
                <td>{{ $author->nationality }}</td>
                <td><a href="/authors/{{ $author->id }}"
                class="btn btn-outline-secondary">View</a>
                <a href="/authors/{{ $author->id }}/edit"
                class="btn btn-outline-primary">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
