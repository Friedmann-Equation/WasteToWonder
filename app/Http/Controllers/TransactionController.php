<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function purchase(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('signin')->with('error', 'You need to be signed in to make a purchase.');
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->product = $request->product;
        $transaction->price = $request->price;
        $transaction->save();

        return redirect()->route('home')->with('success', 'Purchase recorded successfully!');
    }
}
