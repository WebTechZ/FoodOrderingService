<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditMenuController extends Controller
{
    public function index(){
        return view('pages.editMenu') ;
    }
}
