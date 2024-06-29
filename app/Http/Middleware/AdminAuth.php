<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            logger('Admin not logged in, redirecting to login');
            return redirect()->route('admin.login');
        }
    
        logger('Admin logged in, accessing dashboard');
        return $next($request);
    }    
}
