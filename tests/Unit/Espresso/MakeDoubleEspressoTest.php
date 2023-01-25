<?php

namespace Tests\Unit\Espresso;

use Soconnect\Espresso\UseCase\Services\MakeDoubleEspressoService;
use Tests\TestCase;

class MakeDoubleEspressoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }
    public function test_it_should_create_double_espresso()
    {

        $doubleEspresso = resolve(MakeDoubleEspressoService::class);

        $createdEspressoWeight = $doubleEspresso->initMachine()->makeDoubleEspresso();

        $this->assertEquals(config('espresso.double_espresso.liters_of_water'), $createdEspressoWeight );
        
    }

   
}
