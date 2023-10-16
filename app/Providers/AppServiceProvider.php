<?php

namespace App\Providers;

use App\Models\Outlet;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $query = Outlet::all();
		$allData = $query->count();
		$submited = $query->where('status', 1)->count();
		$validated = $query->where('status', 3)->count();
		$requestToDone = $query->where('status', 4)->count();
		$done = $query->where('status', 6)->count();
		$onHold = $query->where('status', 5)->count();
		$requestToProlong = $query->where('status', 9)->count();
		$requestToMaintenance = $query->where('status', 10)->count();
		$discontinued = $query->where('status', 7)->count();

		View::share('allData', $allData);
		View::share('submited', $submited);
		View::share('validated', $validated);
		View::share('requestToDone', $requestToDone);
		View::share('done', $done);
		View::share('onHold', $onHold);
		View::share('requestToProlong', $requestToProlong);
		View::share('requestToMaintenance', $requestToMaintenance);
		View::share('discontinued', $discontinued);

        Blade::if('notempty', function ($data) {
            if(!empty($data) || !is_null($data)) {
                return true;
            }
            return false;
        });

		JsonResource::withoutWrapping();

		Builder::macro('whereLike', function($column, $search) {
			return $this->where($column, 'LIKE', "%{$search}%");
		});
    }
}
