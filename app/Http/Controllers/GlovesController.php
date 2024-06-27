<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlovesController extends Controller
{
    public function index()
    {
        return view('gloves');
    }
}
