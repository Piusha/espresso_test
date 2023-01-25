<?php

namespace Tests\Unit\Espresso;

use Soconnect\Beans\UseCase\Exception\NotEnoughCoffeeBeansInTheContainerException;
use Soconnect\Water\UseCase\Exception\NotEnoughWaterInTheContainerException;
use Soconnect\Espresso\UseCase\Services\MakeEspresso;
use Tests\TestCase;

class MakeEspressoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }
    public function test_it_should_return_no_beans_exception_when_beans_container_is_empty()
    {

        $this->expectException(NotEnoughCoffeeBeansInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.coffee_beans_container_empty"));

        $singleEspresso = resolve(MakeEspresso::class);

        $singleEspresso->addSpoonsOfBeans(1);
        
    }

    public function test_it_should_return_no_water_exception_when_water_container_is_empty()
    {

        $this->expectException(NotEnoughWaterInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.water_container_is_empty"));
        $singleEspresso = resolve(MakeEspresso::class);

        $singleEspresso->addLitersOfWater(1);
        
    }

    public function test_it_should_return_remaining_beans_after_espresso_created()
    {

        $singleEspresso = resolve(MakeEspresso::class);

        $singleEspresso->addBeansAndWaterToTheContainer(
            10,
            2
        );
        $singleEspresso->addSpoonsOfBeans(1);

        $this->assertEquals(9, $singleEspresso->getEspressoMachinesIngredientsStatuses()->beans);
        
    }
    
    public function test_it_should_return_remaining_water_volume()
    {

        $singleEspresso = resolve(MakeEspresso::class);

        $singleEspresso->addBeansAndWaterToTheContainer(
            10,
            2
        );
        $singleEspresso->addLitersOfWater(0.5);

        $this->assertEquals(1.5, $singleEspresso->getEspressoMachinesIngredientsStatuses()->water);
        
    }
    

   
}
