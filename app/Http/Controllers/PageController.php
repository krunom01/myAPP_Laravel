<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function trainings(){
        return view('pages.trainings');
    }
    public function categories(){
        return view('pages.categories');
    }
    public function login(){
        return view('pages.login');
    }
}
