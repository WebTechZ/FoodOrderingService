<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatPageController extends Controller
{
    public function index(){
        return view('pages.statPage') ;
    }
}
