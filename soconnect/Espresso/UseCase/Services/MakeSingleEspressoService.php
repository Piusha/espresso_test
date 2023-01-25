<?php

namespace Soconnect\Espresso\UseCase\Services;


class MakeSingleEspressoService extends Espresso
{

    /**
     * Runs the process for making Espresso
     *
     * @return float amount of litres of coffee made
     *
     * @throws NoBeansException
     * @throws NoWaterException
     */
    public function makeEspresso(): float
    {
        return $this->addSpoonsOfBeans(config('espresso.single_espresso.number_of_bean_spoons'))
            ->addLitersOfWater(config('espresso.single_espresso.liters_of_water'))
            ->getWeightOfCreatedEspresso();
    }

    

}
