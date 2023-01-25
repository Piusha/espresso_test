<?php

namespace Soconnect\Espresso\UseCase\Services;

use Soconnect\BaseUseCase\Contracts\EspressoMachine;
use Soconnect\Beans\UseCase\Contracts\CoffeeBeansContainerContract;
use Soconnect\Water\UseCase\Contracts\WaterContainerContract;

class Espresso extends MakeEspresso implements EspressoMachine
{


    public function initMachine()
    {
        $this->addBeansAndWaterToTheContainer(
            config('beanscontainer.default_bean_spoons_per_container'),
            config('watercontainer.default_liters_per_container')
        );
        return $this;
    }
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
        return 0.0;
    }

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
        return 0.0;
    }

    /**
     * This method controls what is displayed on the screen of the machine
     * Returns ONE of the following human readable statuses in the following preference order:
     *
     * - Add beans and water
     * - Add beans
     * - Add water
     * - {int} Espressos left
     *
     * @return string
     */
    public function getStatus(): string
    {

        $espressoMachineStatus = $this->getEspressoMachinesIngredientsStatuses();

        $status = resolve(EspressoMachineStatusGenerator::class);


        $currentStatus = $status->setRemainingWaterVolumeInTheContainer($espressoMachineStatus->water)
            ->setRemainingSpoonOfBeansInTheContainer($espressoMachineStatus->beans)
            ->getNexStatus();


            if($currentStatus->next_status_code != config('espresso.status.ready_to_calculate')) {
                return $currentStatus->next_status_description;
            }

        
        $remainingCalculator = resolve(RemainingEspressoCalculator::class);
        $remaining = $remainingCalculator-> setRemainingWaterVolumeInTheContainer($espressoMachineStatus->water)
            ->setRemainingSpoonOfBeansInTheContainer($espressoMachineStatus->beans)
            ->getRemaining();

        return "{$remaining} {$currentStatus->next_status_description}";
    }
}
