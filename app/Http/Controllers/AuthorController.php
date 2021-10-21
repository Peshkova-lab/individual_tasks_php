<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function __construct(Request $request) {
        $this->middleware('auth');
    }
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
        if (Auth::user() && Auth::user()->can('add', Author::class)) {
        return view('authors/create', [
            'pictures'=>Picture::all()->sortBy('number')
        ]);}
        else {
            return redirect('/authors');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->can('update', Author::class)) {
        $data = $this->validateData($request);
        \App\Models\Author::create($data);
        return redirect('/authors');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        if (Auth::user() && Auth::user()->can('view', Author::class)) {
        return view('authors/show', [
            'author'=>$author
    ]); }
    else {
        return redirect('authors/');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        if (Auth::user() && Auth::user()->can('update', Author::class)) {
        return view('authors/edit', [
            'author' => $author,
            'pictures'=> $author->pictures->sortBy('name')
        ]);
        } else {
            return redirect('authors/');
        }
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
        if (Auth::user() && Auth::user()->can('update', Author::class)) {
        $data = $this->validateData(\request());

        $author->author = $data['author'];
        $author->nationality = $data['nationality'];

        $picture = Picture::find($data['picture_id']);
        $author->picture()->associate($picture);

        $author->save();

        return redirect('/authors'); }
        else {
            return redirect('authors/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (Auth::user() && Auth::user()->can('delete', Author::class)) {
        $author->delete();
        }
    }
}
