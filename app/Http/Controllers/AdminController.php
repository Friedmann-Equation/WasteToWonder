<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;
use App\Models\Transaction;

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
    }
}    