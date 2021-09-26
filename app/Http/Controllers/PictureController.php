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
        return view('pictures/create');
        }

        public function store(){
        \App\Models\Picture::create([
            'number' => \request('pict-numb'),
            'name' => \request('pict-name'),
            'author' => \request('pict-author'),
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
            \request(['number', 'name', 'author'])
        );

        $picture->save();
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
