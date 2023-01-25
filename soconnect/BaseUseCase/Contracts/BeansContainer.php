<?php
namespace Soconnect\BaseUseCase\Contracts;


interface BeansContainer
{
    /**
     * Adds beans to the container
     *
     * @param int $numSpoons number of spoons of beans
     *
     * @return void
     * @throws ContainerFullException
     *
     */
    public function addBeans(int $numSpoons): void;

    /**
     * Use $numSpoons from the container
     *
     * @param int $numSpoons number of spoons of beans
     *
     * @return int number of bean spoons used
     */
    public function useBeans(int $numSpoons): int;

    /**
     * Returns the number of spoons of beans left in the container
     *
     * @return int
     */
    public function getBeans(): int;
}
