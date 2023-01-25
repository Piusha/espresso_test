<?php

namespace Tests\Unit\Espresso;

use Soconnect\Espresso\UseCase\Services\EspressoMachineStatusGenerator;
use Soconnect\Espresso\UseCase\Services\MakeSingleEspressoService;
use Soconnect\Espresso\UseCase\Services\RemainingEspressoCalculator;
use Tests\TestCase;

class RemainingEspressoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_it_should_return_add_beans_and_water_when_water_and_beans_are_empty()
    {
        $status = resolve(RemainingEspressoCalculator::class);
        $currentStatus = $status->setRemainingWaterVolumeInTheContainer(2)
            ->setRemainingSpoonOfBeansInTheContainer(10)
            ->getRemaining();
        $this->assertEquals(2, $currentStatus );
        
    }

}
