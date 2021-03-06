<?php

namespace App\Providers;

use App\Http\Controllers\jeuVideoController;
use App\Models\Console;
use App\Models\JeuVideo;
use App\Models\Rayon;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Carbon::setLocale('fr');
        View::share('rayons', Rayon::all());
        View::share('consoles', Console::all());
        View::share('client', Auth::user() ? Auth::user() : null);
    }
}
