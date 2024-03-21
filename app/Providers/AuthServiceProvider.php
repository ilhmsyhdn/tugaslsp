<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Mengatur Hak Akses untuk Admin
 Gate::define('admin-only', function ($user) {
    if ($user->level == 'admin'){
    return true;
    }
    return false;
    });
    //Mengatur Hak Akses untuk Guru
    Gate::define('guru-only', function ($user) {
    if ($user->level == 'guru'){
    return true;
    }
    return false;
    });
    //Mengatur Hak Akses untuk Siswa
    Gate::define('siswa-only', function ($user) {
    if ($user->level == 'siswa'){
    return true;
    }
    return false;
    });
    }
    
}
