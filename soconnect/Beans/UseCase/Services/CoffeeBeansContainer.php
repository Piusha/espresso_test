<?php

namespace Soconnect\Beans\UseCase\Services;

use Soconnect\Beans\UseCase\Contracts\CoffeeBeansContainerContract;
use Soconnect\Beans\UseCase\Exception\CoffeeBeansContainerFullException;
use Soconnect\Beans\UseCase\Exception\NotEnoughCoffeeBeansInTheContainerException;

use function config;

class CoffeeBeansContainer implements CoffeeBeansContainerContract
{

    /**
     * The amount of spoons
     * @var integer
     */
    protected $numOfSpoonsOfBeans = 0;

    public function __construct()
    {
        $this->numOfSpoonsOfBeans = 0;
    }

    /**
     * Get Maximum number of spoons per Container
     *
     * @return integer
     */
    private function getMaxNumberOfSpoonsPerContainer(): int
    {
        return config('beanscontainer.max_bean_spoons_per_container');
    }
    /**
     * Adds beans to the container
     *
     * @param int $numSpoons number of spoons of beans
     *
     * @return void
     * @throws CoffeeBeansContainerFullException
     *
     */
    public function addBeans(int $numSpoons): void
    {

        if ($this->getMaxNumberOfSpoonsPerContainer() < $numSpoons) {
            throw new CoffeeBeansContainerFullException(__("exceptions.trying_to_add_max_number_of_beans_to_the_container"));
        }

        $this->numOfSpoonsOfBeans += $numSpoons;

        if ($this->getMaxNumberOfSpoonsPerContainer() < $this->getBeans()) {

            throw new CoffeeBeansContainerFullException(__("exceptions.exceed_maximum_number_of_spoon_per_container", [
                'numberOfSpoons' => $this->getMaxNumberOfSpoonsPerContainer()
            ]));
        }
    }

    /**
     * Use $numSpoons from the container
     *
     * @param int $numSpoons number of spoons of beans
     *
     * @return int number of bean spoons used
     * @throws NotEnoughCoffeeBeansInTheContainerException
     */
    public function useBeans(int $numSpoons): int
    {

        if ($this->getBeans() == 0) {
            throw new NotEnoughCoffeeBeansInTheContainerException(__("exceptions.coffee_beans_container_empty"));
        }

        if ($this->getBeans() <  $numSpoons) {
            throw new NotEnoughCoffeeBeansInTheContainerException(__("exceptions.not_enough_beans_in_the_container"));
        }

        $this->numOfSpoonsOfBeans -= $numSpoons;

        return $numSpoons;
    }

    /**
     * Returns the number of spoons of beans left in the container
     *
     * @return int
     */
    public function getBeans(): int
    {
        return $this->numOfSpoonsOfBeans;
    }
}
