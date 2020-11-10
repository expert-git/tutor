<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Auth;
use DB;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

         view()->composer('*', function ($view) {
            $data['subs'] = DB::table('subjects')->take(30)->get();
            $data['con'] = DB::table('countries')->limit(10)->get();

            View::composer('partials.footer', function($view) use($data)
                {
                    $view->with('data', $data);
                });
                 
            if(Auth::check())
            {
                $wallet = DB::table('wallets')                               
                                    ->where('user_id','=',Auth::user()->id)
                                    ->first(['balance']);
 
                View::composer('dashboard.partials.dashboard-sidebar', function($view) use($wallet)
                {
                    $view->with('wallet',$wallet);
                });
            }   
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
