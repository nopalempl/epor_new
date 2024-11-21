<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
{
    public function handle($request, Closure $next)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Memeriksa apakah pengguna ada dan aktif
        if (!$user || $user->status_aktif != 1) {
            // Jika pengguna tidak aktif, redirect atau abort
            return redirect('/login')->withErrors(['error' => 'Akun Anda tidak aktif.']);
        }

        return $next($request);
    }
}
