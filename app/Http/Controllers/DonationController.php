<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'bottle_type' => 'required|string',
            'amount' => 'required|integer',
        ]);

        Donation::create($validatedData);

        return redirect()->back()->with('success', 'Donation recorded successfully.');
    }

    public function index()
    {
        $donations = Donation::all(); 
        return view('admin.customers', compact('donations')); 
    }
}
