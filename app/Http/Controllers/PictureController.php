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
        $picture = new \App\Models\Picture();

        $picture->number = \request('pict-numb');

        $picture->name = \request('pict-name');

        $picture->author = \request('pict-author');

        $picture->save();
        return redirect('/pictures');
        }

        public function edit($id) {
        $picture = \App\Models\Picture::find($id);
        return view('pictures/edit', [
            'picture' => $picture,
        ]);
        }

        public function update($id) {
        $picture = \App\Models\Picture::find($id);

        $picture->number = \request('pict-numb');
        $picture->name = \request('pict-name');
        $picture->author = \request('pict-author');

        $picture->save();

        return redirect('/pictures');
        }
}
