<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('read-dashboard', function ($user) {
            return $user->hasPermission('read-dashboard');
        });

        Gate::define('read-pelayanan', function ($user) {
            return $user->hasPermission('read-pelayanan');
        });

        Gate::define('read-registrasi', function ($user) {
            return $user->hasPermission('read-registrasi');
        });

        Gate::define('read-permohonan-faktur', function ($user) {
            return $user->hasPermission('read-permohonan-faktur');
        });

        Gate::define('read-daftar-usaha', function ($user) {
            return $user->hasPermission('read-daftar-usaha');
        });

        Gate::define('read-verifikasi-permohonan', function ($user) {
            return $user->hasPermission('read-verifikasi-permohonan');
        });

        Gate::define('read-input-ssrd', function ($user) {
            return $user->hasPermission('read-input ssrd');
        });

        Gate::define('read-penetapan', function ($user) {
            return $user->hasPermission('read-penetapan');
        });
        
        Gate::define('read-penetapan-billing', function ($user) {
            return $user->hasPermission('read-penetapan-billing');
        });

        Gate::define('read-laporan', function ($user) {
            return $user->hasPermission('read-laporan');
        });

        Gate::define('read-rekap-stor-struk', function ($user) {
            return $user->hasPermission('read-rekap-stor-struk');
        });

        Gate::define('read-laporan-penerimaan', function ($user) {
            return $user->hasPermission('read-laporan-penerimaan');
        });

        Gate::define('read-laporan-permohonan', function ($user) {
            return $user->hasPermission('read-laporan-permohonan');
        });

        Gate::define('read-laporan-stok-struk', function ($user) {
            return $user->hasPermission('read-laporan-stok-struk');
        });

        Gate::define('read-laporan-persediaan-struk', function ($user) {
            return $user->hasPermission('read-laporan-persediaan-struk');
        });

        Gate::define('read-setting', function ($user) {
            return $user->hasPermission('read-setting');
        });

        Gate::define('read-manajemen-user', function ($user) {
            return $user->hasPermission('read-manajemen-user');
        });

        Gate::define('read-manajemen-level', function ($user) {
            return $user->hasPermission('read-manajemen-level');
        });

        Gate::define('read-manajemen-berita', function ($user) {
            return $user->hasPermission('read-manajemen-berita');
        });
    }
}
