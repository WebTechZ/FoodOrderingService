<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderPageController extends Controller
{
    public function index(){
        return view('pages.orderPage') ;
    }
}
