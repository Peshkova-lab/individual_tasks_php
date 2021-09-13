<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view ("home");
    }

    public function about() {
        return view ( "about");
    }

    public function pictures() {
        $pictures = [
            ['number' => '1', 'name' => 'Starlight Night', 'author' => 'Vincent van Gogh'],
            ['number' => '2', 'name' => 'The Lake at Vilabertran', 'author' => 'Salvador Dali'],
            ['number'=> '3', 'name' => 'The Persistence of Memory', 'author' => 'Salvador Dali'],
        ];
        return view ("pictures", [
            'pictures' => $pictures
        ]);
    }
}
