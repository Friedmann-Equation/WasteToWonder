<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'bottle_type' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
        ]);

        // Insert the donation data into the database
        DB::table('donations')->insert([
            'user_id' => auth()->id(), // Assuming user is authenticated
            'bottle_type' => $request->input('bottle_type'),
            'amount' => $request->input('amount'),
            'created_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Donation recorded successfully!');
    }
}
