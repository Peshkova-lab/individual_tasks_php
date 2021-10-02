<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = \App\Models\Picture::all()->sortBy("name");

        return view('pictures/index', [
            'pictures' => $pictures,
            'pageTitle' => 'Famous picture and their authors',
        ]);
    }

        public function getList()
        {
            return \App\Models\Picture::all();
        }

        public function create() {
        return view('pictures/create', [
            'authors' => \App\Models\Author::all()->sortBy('id')
        ]);
        }

        public function store(){
        $data = request()->validate([
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

        \App\Models\Picture::create([
            'number' => $data['pict-numb'],
            'name' => $data['pict-name'],
            'author_id' => $data['pict-author'],
            'author' =>$data['pict-author'],
        ]);
;
        return redirect('/pictures');
        }

        public function edit(\App\Models\Picture $picture) {

        return view('pictures/edit', [
            'picture' => $picture,
        ]);
        }

        public function update(\App\Models\Picture $picture) {

        $picture->update(
            \request()->validate([
                'number'=>'required|min:1|max:20',
                'name' => 'required|min:3|max:200',
                'author' => 'required|min:5|max:100',
            ], [
                'number.required' => 'Input number of picture!',
                'number.min' => 'Number can not be less then 1 symbols!',
                'number.max' => 'Number can not be more then 20 symbols!',
                'name.required' => 'Input name of picture!',
                'name.min' => 'Name can not be less then 3 symbols!',
                'name.max' => 'Name can not be more then 200 symbols!',
                'author.required' => 'Input author of picture!',
                'author.min' => 'Author can not be less then 5!',
                'author.max' => 'Author can not be more then 100!',
            ])
        );

        return redirect('/pictures');
        }

        public function destroy(\App\Models\Picture $picture) {
        $picture->delete();
        }

        public function show(\App\Models\Picture $picture) {

        if (is_null($picture)) {
            return "Picture does not exist!";
        }

        return view('pictures/show', [
            'picture' => $picture
        ]);
        }
}
