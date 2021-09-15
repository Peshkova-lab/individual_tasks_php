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
}
