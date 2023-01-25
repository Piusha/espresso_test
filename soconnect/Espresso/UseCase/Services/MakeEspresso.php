<?php

namespace Soconnect\Espresso\UseCase\Services;

use Soconnect\Beans\UseCase\Contracts\CoffeeBeansContainerContract;
use Soconnect\Water\UseCase\Contracts\WaterContainerContract;

class MakeEspresso
{


    protected $beanContainer;

    protected $waterContainer; 

    protected $literOfEspressoCreated;

    public function __construct(CoffeeBeansContainerContract $coffeeBeansContainerContract, WaterContainerContract $waterContainer )
    {
        $this->beanContainer = $coffeeBeansContainerContract;
        $this->waterContainer = $waterContainer;

    }

    public function addBeansAndWaterToTheContainer(int $numSpoons, float $water)
    {

        $this->beanContainer->addBeans($numSpoons);
        $this->waterContainer->addWater($water);

    }

    public function addSpoonsOfBeans(int $numOfSpoonsOfBeans)
    {

        $this->beanContainer->useBeans($numOfSpoonsOfBeans);

        return $this;


    }

    public function addLitersOfWater(float $water)
    {

        $this->literOfEspressoCreated = $this->waterContainer->useWater($water);

        return $this;
    }


    public function getWeightOfCreatedEspresso(): float
    {
       return $this->literOfEspressoCreated;
    }

    public function getEspressoMachinesIngredientsStatuses()
    {
        return (object)[
            'beans' => $this->beanContainer->getBeans(),
            'water' => $this->waterContainer->getWater()
        ];
    }


    
}
