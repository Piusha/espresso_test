<?php
namespace Soconnect\BaseUseCase\Contracts;


interface EspressoMachine
{
    /**
     * Runs the process for making Espresso
     *
     * @return float amount of litres of coffee made
     *
     * @throws NoBeansException
     * @throws NoWaterException
     */
    public function makeEspresso(): float;

    /**
     * Runs the process for making Double Espresso
     *
     * @return float of litres of coffee made
     *
     * @throws NoBeansException
     * @throws NoWaterException
     */
    public function makeDoubleEspresso(): float;

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
    public function getStatus(): string;
}
