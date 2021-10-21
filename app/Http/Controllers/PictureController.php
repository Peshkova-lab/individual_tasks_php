<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    private $author;
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $this->author=\App\Models\Author::find($request->route('authid'));

        view()->share(
            'author_filter_id', $request->route('authid')
        );
    }

    public function index($auth)
    {
        if($this->author) {
            $pictures = $this->author->pictures->sortBy("name");
        } else {
            $pictures = \App\Models\Picture::all()->sortBy("name");
        }

        return view('pictures/index', [
            'pictures' => $pictures,
            'pageTitle' => 'Famous picture and their authors',
            'authors' => \App\Models\Author::all()->sortBy('id'),
        ]);
    }

        public function getList()
        {
            return \App\Models\Picture::all();
        }

        public function create($auth) {
        return view('pictures/create', [
            'authors' => \App\Models\Author::all()->sortBy('id')
        ]);
        }

        public function store($auth){

        $data = $this->validateData(request());

        \App\Models\Picture::create([
            'number' => $data['pict-numb'],
            'name' => $data['pict-name'],
            'author_id' => $data['pict-author'],
            'author' =>$data['pict-author'],
        ]);

        return redirect('author/'.$auth.'/pictures');
        }

        public function edit($auth, \App\Models\Picture $picture) {

        return view('pictures/edit', [
            'picture' => $picture,
            'authors' => \App\Models\Author::all()->sortBy('id')
        ]);
        }

        public function update($auth, \App\Models\Picture $picture) {
        $data = $this->validateData(\request());

        $picture->number = $data['pict-numb'];

        $picture->name = $data['pict-name'];

        $picture->authorF()->associate(\App\Models\Author::find($data['pict-author']));

        $picture->save();

        return redirect('author/'.$auth.'/pictures');
        }

        private function validateData($data) {
            return $this->validate($data, [
            'pict-numb'=>'required|min:1|max:20',
            'pict-name' => 'required|min:3|max:200',
            'pict-author' => 'required|exists:authors,id',
        ], [
            'pict-numb.required' => 'Input number of picture!',
            'pict-numb.min' => 'Number can not be less then 1 symbols!',
            'pict-numb.max' => 'Number can not be more then 20 symbols!',
            'pict-name.required' => 'Input name of picture!',
            'pict-name.min' => 'Name can not be less then 3 symbols!',
            'pict-name.max' => 'Name can not be more then 200 symbols!',
            'pict-author.required' => 'Choose author of picture!',
            'pict-author.exists' => 'Author you chose is not exist!'
            ]);
        }

        public function destroy($auth, \App\Models\Picture $picture) {
        $picture->delete();
        }

        public function show($auth, \App\Models\Picture $picture) {

        if (is_null($picture)) {
            return "Picture does not exist!";
        }

        return view('pictures/show', [
            'picture' => $picture
        ]);
        }
}
