<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;
use App\Models\Transaction;

use App\Models\BottleDonation;
use App\Models\GlovePurchase;

class AdminController extends Controller
{
    protected $adminPassword = 'secretpassword';

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);
    
        if ($request->password === $this->adminPassword) {
            session(['admin_logged_in' => true]);
            logger('Admin logged in, session set');
            return redirect()->route('admin.dashboard');
        }
    
        logger('Admin login failed');
        return back()->withErrors([
            'password' => 'The provided password is incorrect.',
        ]);
    }
    
    public function showDashboard()
    {
        logger('Accessing admin dashboard');
        $customers = User::all();
        $donations = Donation::all(); 
        $transactions = Transaction::all();
    
        return view('admin.dashboard', compact('customers', 'donations', 'transactions'));
        return view('admin.customers', compact('customers', 'donations', 'transactions'));
    }

    public function showCustomers() {
        $customers = User::all(); 
        return view('admin.customers', compact('customers'));
    }

    public function showBottleDonations() {
        $donations = Donation::all(); 
        return view('admin.bottle_donations', compact('donations'));
    }

    public function showGlovePurchases() {
        $transactions = Transaction::all();
        return view('admin.glove_purchases', compact('transactions'));
    }

}    