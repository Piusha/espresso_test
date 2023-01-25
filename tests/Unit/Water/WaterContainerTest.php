<?php

namespace Tests\Unit\Water;

use Tests\TestCase;
use Soconnect\Water\UseCase\Exception\NotEnoughWaterInTheContainerException;
use Soconnect\Water\UseCase\Exception\WaterContainerFullException;

class WaterContainerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }
    public function test_is_should_return_water_container_full_exception_when_trying_to_add_more_than_max_liters_of_container_at_once()
    {

        $this->expectException(WaterContainerFullException::class);
        $this->expectExceptionMessage(__("exceptions.cannot_exceed_water_limit_when_adding"));
        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');
        $waterContainer->addWater(80);

        
    }

    public function test_is_should_return_water_container_full_exception_when_exceed_number_of_liters_per_container()
    {

        $this->expectException(WaterContainerFullException::class);
        $this->expectExceptionMessage(__('exceptions.maximum_limit_of_water_exceed', [
            'numberOfLiters' => config('watercontainer.max_liters_per_container'),
        ]));
        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->addWater(1);
        $waterContainer->addWater(2);

        
    }
    public function test_is_should_add_water_to_the_container()
    {

        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->addWater(1);
        $waterContainer->addWater(1);

        $this->assertEquals(2, $waterContainer->getWater());
    }

    public function test_is_should_return_water_container_is_empty_exception_message_when_trying_to_use_water()
    {

        $this->expectException(NotEnoughWaterInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.water_container_is_empty"));
        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->useWater(10);

        
    }

    public function test_is_should_return_water_container_is_empty_exception_when_trying_to_use_more_liters_than_existing_in_the_container()
    {

        $this->expectException(NotEnoughWaterInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.not_enough_water_in_container"));
        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->addWater(2);

        $waterContainer->useWater(1);
        $waterContainer->useWater(2);

        
    }

    public function test_is_should_return_remaining_water_liters()
    {

        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->addWater(2);
        $remaining = $waterContainer->useWater(1);
        $this->assertEquals(1, $remaining);
    }

    public function test_is_should_return_remaining_water_liters_in_the_container()
    {

        $waterContainer = app('Soconnect\Water\UseCase\Services\WaterContainer');

        $waterContainer->addWater(2);
        $waterContainer->useWater(1);
        $waterContainer->useWater(1);
        $this->assertEquals(0, $waterContainer->getWater());
    }
}
