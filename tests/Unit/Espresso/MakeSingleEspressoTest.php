<?php

namespace Tests\Unit\Espresso;

use Soconnect\Espresso\UseCase\Services\MakeSingleEspressoService;
use Tests\TestCase;

class MakeSingleEspressoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }
    public function test_it_should_create_single_espresso()
    {

        $singleEspresso = resolve(MakeSingleEspressoService::class);

        $createdEspressoWeight = $singleEspresso->initMachine()->makeEspresso();

        $this->assertEquals(config('espresso.single_espresso.liters_of_water'), $createdEspressoWeight );
        
    }


    public function test_it_should_return_remaining_espressos_message()
    {

        $singleEspresso = resolve(MakeSingleEspressoService::class);

        $singleEspresso->initMachine();
        $singleEspresso->makeEspresso();


        $this->assertEquals('0 Espressos left', $singleEspresso->getStatus());
        
    }
   
}
