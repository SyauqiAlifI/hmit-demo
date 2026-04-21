<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function services() {
        return view('services');
    }

    public function gallery() {
        return view('gallery');
    }

    public function blogs() {
        return view('blogs');
    }

    public function contacts() {
        return view('contacts');
    }
}
