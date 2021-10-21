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

    public function admin() {
        if (Gate::allows('admin-panel')) {
        return view("admin");
        } else {
        return view("home");
        }
    }
}
