<?php

namespace Soconnect\Espresso\UseCase\Services;


class MakeDoubleEspressoService extends Espresso
{

    /**
     * Runs the process for making Double Espresso
     *
     * @return float of litres of coffee made
     *
     * @throws NoBeansException
     * @throws NoWaterException
     */
    public function makeDoubleEspresso(): float
    {
        return $this->addSpoonsOfBeans(config('espresso.double_espresso.number_of_bean_spoons'))
        ->addLitersOfWater(config('espresso.double_espresso.liters_of_water'))
        ->getWeightOfCreatedEspresso();
    }


}
