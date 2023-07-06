<?php

namespace App\Providers;

use App\Modules\Region\Repositories\IRegionRepository;
use App\Modules\Region\Repositories\RegionRepositoryAPICall;
use App\Modules\Region\Repositories\RegionRepositoryImpl;
use App\Modules\Region\Services\IRegionService;
use App\Modules\Region\Services\RegionServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IRegionRepository::class, RegionRepositoryImpl::class);
        $this->app->bind(IRegionService::class, RegionServiceImpl::class);

        if(config('app.data_source') == 'API'){
            $this->app->bind(IRegionRepository::class, RegionRepositoryAPICall::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
