<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminAuth.login');
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:1'
        ]);
        $request->remember == 1 ? $remember = true : $remember =false;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function forgot_password()
    {
        return view('admin.adminAuth.forgot_password');
    }
}
