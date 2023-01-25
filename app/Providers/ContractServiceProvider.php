<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Soconnect\Beans\UseCase\Contracts\CoffeeBeansContainerContract;
use Soconnect\Beans\UseCase\Services\CoffeeBeansContainer;
use Soconnect\Water\UseCase\Contracts\WaterContainerContract;
use Soconnect\Water\UseCase\Services\WaterContainer;

class ContractServiceProvider extends ServiceProvider
{

    private $contracts = [
        CoffeeBeansContainerContract::class => CoffeeBeansContainer::class,
        WaterContainerContract::class => WaterContainer::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->contracts as $contract => $serviceClass) {
            $this->app->bind(
                $contract,
                $serviceClass
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
