<?php

namespace Tests\Unit\Beans;

use Tests\TestCase;
use Soconnect\Beans\UseCase\Exception\CoffeeBeansContainerFullException;
use Soconnect\Beans\UseCase\Exception\NotEnoughCoffeeBeansInTheContainerException;

class BeansTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Your code
    }
    public function test_is_should_return_coffee_bean_container_full_exception_when_trying_to_add_more_than_max_spoons_of_means_at_once()
    {

        $this->expectException(CoffeeBeansContainerFullException::class);
        $this->expectExceptionMessage(__("exceptions.trying_to_add_max_number_of_beans_to_the_container"));
        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');

        $coffeeContainer->addBeans(80);

        
    }

    public function test_is_should_return_coffee_bean_container_full_exception_when_exceed_number_of_spoons_for_container()
    {

        $this->expectException(CoffeeBeansContainerFullException::class);
        $this->expectExceptionMessage(__("exceptions.exceed_maximum_number_of_spoon_per_container", [
            'numberOfSpoons' => config('beanscontainer.max_bean_spoons_per_container')
        ]));
        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');

        $coffeeContainer->addBeans(10);
        $coffeeContainer->addBeans(50);

        
    }
    public function test_is_should_add_coffee_beans_to_the_container()
    {

        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');

        $coffeeContainer->addBeans(10);
        $coffeeContainer->addBeans(30);

        $this->assertEquals(40, $coffeeContainer->getBeans());
    }

    public function test_is_should_return_coffee_bean_container_is_empty_exception_message_when_trying_to_use_beans()
    {

        $this->expectException(NotEnoughCoffeeBeansInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.coffee_beans_container_empty"));
        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');
        
        $coffeeContainer->useBeans(10);

        
    }

    public function test_is_should_return_coffee_bean_container_is_empty_exception_when_trying_to_use_beans_more_than_existing_in_the_container()
    {

        $this->expectException(NotEnoughCoffeeBeansInTheContainerException::class);
        $this->expectExceptionMessage(__("exceptions.not_enough_beans_in_the_container"));
        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');

        $coffeeContainer->addBeans(10);
        $coffeeContainer->useBeans(40);

        
    }

    public function test_is_should_return_use_beans()
    {

        $coffeeContainer = app('Soconnect\Beans\UseCase\Services\CoffeeBeansContainer');

        $coffeeContainer->addBeans(50);
        $coffeeContainer->useBeans(40);

        $this->assertEquals(10, $coffeeContainer->getBeans());
    }
}
