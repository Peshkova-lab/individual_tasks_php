<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Picture;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors/index', [
            'authors' => Author::all()->sortBy("author")
        ]);
    }

    private function validateData($data) {
        return $this->validate($data, [
            'author' => 'required|min:3|max:100',
            'nationality'=>'required|min:3|max:30',
            'picture_id'=>'required|exists:pictures,id'
        ], [
            'author.required' => 'Input this field!',
            'author.min' => 'This field can not be less then 3 symbols!',
            'author.max' => 'This field can not be more then 100 symbols!',
            'nationality.required' => 'Input this field!',
            'nationality.min' => 'This field can not be less then 3 symbols!',
            'nationality.max' => 'This field can not be more then 30 symbols!',
            'picture_id.required' => "Choose picture!",
            'picture_id.exists' => 'Incorrect chosen!'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors/create', [
            'pictures'=>Picture::all()->sortBy('number')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        \App\Models\Author::create($data);
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('authors/show', [
            'author'=>$author
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors/edit', [
            'author' => $author,
            'pictures'=> $author->pictures->sortBy('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $data = $this->validateData(\request());

        $author->author = $data['author'];
        $author->nationality = $data['nationality'];

        $picture = Picture::find($data['picture_id']);
        $author->picture()->associate($picture);

        $author->save();

        return redirect('/authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
