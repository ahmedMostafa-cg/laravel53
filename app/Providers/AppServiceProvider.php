<?php

namespace App\Providers;

use View;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Blade::directive('age', function($expression){
            $data = json_decode($expression);

            $year       = $data[0];
            $month    = $data[1];
            $day         = $data[2];

            $age = Carbon::createFromDate($year, $month, $day)->age;
            return "<?php echo $age ?>";
       });

       Blade::directive('sayHello', function($expression){
        return "<?php echo 'Hello ' . $expression; ?>";
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $age = Carbon::createFromDate(1986, 8 , 1)->age;

        View::share('age', $age);
        View::share('myanme', 'Ahmed');
        // View::share('auth', Auth::user());

        View::composer('*', function($view){
            $view->with('auth', Auth::user());
        });    }
}
