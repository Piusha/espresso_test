<?php

namespace Soconnect\Espresso\UseCase\Services;


class RemainingEspressoCalculator
{

    private $waterVolume;

    private $spoonsOfBeans;


    public function setRemainingWaterVolumeInTheContainer(float $waterVolume)
    {

        $this->waterVolume = $waterVolume;
        return $this;
    }

    public function setRemainingSpoonOfBeansInTheContainer(int $spoonsOfBeans)
    {

        $this->spoonsOfBeans = $spoonsOfBeans;
        return $this;
    }

    private function calculateRemaining()
    {

        return min($this->waterVolume , $this->spoonsOfBeans);
       
    }
//   2010 / 1.05

    public function getRemaining() : int
    {
        return $this->calculateRemaining();
    }
}
