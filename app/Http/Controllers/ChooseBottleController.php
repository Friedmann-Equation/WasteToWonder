<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChooseBottleController extends Controller
{
    public function index()
    {
        return view('choose-bottle');
    }
}
