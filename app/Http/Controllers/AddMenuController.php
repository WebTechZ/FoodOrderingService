<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMenuController extends Controller
{
    public function index(){
        return view('pages.addMenu') ;
    }
}
