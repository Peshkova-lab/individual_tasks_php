@extends("layout")

@section("app-title", "List of pictures")
@section("page-title", "Add picture")

@section("page-content")
    <form method="post" action="/pictures" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pict-numb">Number</label>
            <input type="text" value="{{ old('pict-numb') }}" class="form-control {{ $errors->has('pict-numb') ? 'is-invalid':'' }}" name="pict-numb" id="pict-numb" placeholder="Input number of picture">
        <small class="form-text text-danger">
            <ul>
                @foreach($errors->get('pict-numb') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </small>
        </div>
        <div class="form-group">
            <label for="pict-name">Name</label>
            <input type="text" value="{{ old('pict-name') }}" class="form-control {{ $errors->has('pict-name') ? 'is-invalid':'' }}" name="pict-name" id="pict-name" placeholder="Input name of picture">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('pict-name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="pict-author">Author</label>
            <input type="text" value="{{ old('pict-author') }}" class="form-control {{ $errors->has('pict-author') ? 'is-invalid':'' }}" name="pict-author" id="pict-author" placeholder="Input author of picture">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('pict-author') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>

        <button type="submit" class="btn btn-primary float-right">Add</button>
    <div class="clearfix"></div>
        @if ($errors->any())
        <div class="row border border-danger rounded text-danger" style="margin: 20px; padding: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
@endsection
