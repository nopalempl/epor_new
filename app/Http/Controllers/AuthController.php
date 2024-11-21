<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function showLoginForm(Request $request)
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $response = response()->view('pages.login-v3');
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

        return $response;
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        $user = User::where('username', $request->username)->first();

        if ($user) {
            if ($user->status_aktif == 1) {

                if (Auth::attempt($request->only('username', 'password'))) {

                    if ($user->hasPermissionTo('read-dashboard')) {
                        return redirect()->route('dashboard');
                    } else {

                        return redirect()->route('pages.registrasi.index');
                    }
                } else {
                    Log::info('Login attempt failed for username: ' . $request->username);
                    return back()->withErrors([
                        'username' => 'Username atau password salah.',
                    ])->withInput($request->only('username'));
                }
            } else {
                return back()->withErrors([
                    'username' => 'Akun Anda tidak aktif. Silakan hubungi administrator.',
                ])->withInput($request->only('username'));
            }
        } else {
            return back()->withErrors([
                'username' => 'Username tidak ditemukan.',
            ])->withInput($request->only('username'));
        }

        Log::info('Login attempt failed for username: ' . $request->username);
        return back()->withErrors([
            'username' => 'Username atau password salah, atau akun tidak aktif.',
        ])->withInput($request->only('username'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
