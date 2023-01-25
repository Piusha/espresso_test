<?php

namespace Soconnect\Water\UseCase\Services;

use Soconnect\Water\UseCase\Contracts\WaterContainerContract;
use Soconnect\Water\UseCase\Exception\NotEnoughWaterInTheContainerException;
use Soconnect\Water\UseCase\Exception\WaterContainerFullException;

class WaterContainer implements WaterContainerContract
{

    /**
     * The liter
     * @var integer
     */
    protected $numOfLiters = 0;

    public function __construct()
    {
        $this->numOfLiters = 0;
    }

    /**
     * Get Maximum number of Water Liter
     *
     * @return integer
     */
    private function getMaxLiterOfWaterPerContainer(): int
    {
        return config('watercontainer.max_liters_per_container');
    }
    /**
     * Adds water to the coffee machine's water tank
     *
     * @param float $litres number of litres of water
     *
     * @return void
     * @throws ContainerFullException
     *
     */
    public function addWater(float $litres): void
    {


        if ($this->getMaxLiterOfWaterPerContainer() < $litres) {
            throw new WaterContainerFullException(__("exceptions.cannot_exceed_water_limit_when_adding"));
        }

        $this->numOfLiters += $litres;

        if ($this->getMaxLiterOfWaterPerContainer() < $this->getWater()) {

            throw new WaterContainerFullException(__('exceptions.maximum_limit_of_water_exceed', [
                'numberOfLiters' => $this->getMaxLiterOfWaterPerContainer(),
            ]));
        }
    }

    /**
     * Use $litres from the container
     *
     * @param float $litres float number of litres of water
     *
     * @return float number of litres used
     */
    public function useWater(float $litres): float
    {

        if ($this->getWater() == 0) {
            throw new NotEnoughWaterInTheContainerException(__("exceptions.water_container_is_empty"));
        }

        if ($this->getWater() <  $litres) {
            throw new NotEnoughWaterInTheContainerException(__("exceptions.not_enough_water_in_container"));
        }

        $this->numOfLiters -= $litres;

        return $litres;
    }

    /**
     * Returns the volume of water left in the container
     *
     * @return float number of litres remaining
     */
    public function getWater(): float
    {
        return $this->numOfLiters;
    }
}
