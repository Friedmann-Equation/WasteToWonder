<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function index()
    {
        return view('points');
    }
}
