<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BottlesController extends Controller
{
    public function index()
    {
        return view('bottles');
    }
}
