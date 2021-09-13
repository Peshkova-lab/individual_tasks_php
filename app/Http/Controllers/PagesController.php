<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPicture {
    private $number;
    private $name;
    private $author;

    public function __construct(String $number, String $name, String $author) {
        $this->number = $number;
        $this->name = $name;
        $this->author = $author;
    }

    public function getNumber(): String {
        return $this->number;
    }

    public function getName(): String {
        return $this->name;
    }

    public function getAuthor(): String {
        return $this->author;
    }

    public static function getPictures() {
        return [
            new MyPicture('1', 'Starlight Night', 'Vincent van Gogh'),
            new MyPicture('2', 'The Lake at Vilabertran', 'Salvador Dali'),
            new MyPicture('3', 'The Persistence of Memory', 'Salvador Dali'),
        ];
    }
}

class PagesController extends Controller
{
    public function home() {
        return view ("home");
    }

    public function about() {
        return view ( "about");
    }

    public function pictures() {
        return view ("pictures", [
            'pictures' => MyPicture::getPictures(),
            'pageTitle' => 'Famous pictures and their authors'
        ]);
    }
}
